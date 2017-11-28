<?php

namespace App\Http\Controllers\Content;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Content\ContentFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Content; 

/**
 * @resource Content
 *
 * The database has a vast volume of content nodes stored in the content table. Nodes may store content in different formats. Common formats are:
 * - HTML
 * - Images
 * - PDF documents
 * - Multi-media formats such as audio and video
*/
class ApiContentController extends Controller
{
    protected $content;

    public function __construct(Content $content){
        $this->content = $content;
    }  
    /**
     * List all subjects
     *
     * Display a list of all content subjects and nodeIDs in alphabetical order. 
     *
     * Notes:
     *  - Returns an array of "ID" and "Header" JSON objects.
     *  - The resultset is wrapped in a "data": {} JSON object.
     *  - The resultset is paginated into sets of 100 results.
     * 
     * Example with 2 results per page:
     *
     *  {
     *      "data": {
     *           "current_page": 1,
     *           "data": [
     *           {
     *               "ID": 6557,
     *               "Header": " 3. Motor disorders of the body of the oesophagus and lower oesophageal sphincter"
     *           },
     *           {
     *               "ID": 11217,
     *               "Header": " 6. God welcomes children fully into the family of faith"
     *           }
     *       ],
     *       "from": 1,
     *       "last_page": 10217,
     *       "next_page_url": "http://xxx.xxx/api/v1/contentapi?page=2",
     *       "path": "http://xxx.xx/api/v1/contentapi",
     *       "per_page": 100,
     *       "prev_page_url": null,
     *       "to": 2,
     *       "total": 20433
     *   }
     *
     * @return \Illuminate\Http\Response as JSON
     */
    public function index() 
    {
        $content = $this->content->select(['ID', 'Header'])->whereNotNull('Header')->orderBy( 'Header', 'asc')->paginate(5);
        return response()->json(['data'=>$content], 201);
    }

    /**
     * Search for subjects
     *
     * Display an alphabetical list of subjects and nodeIDs that match the search criteria. 
     *
     * Notes:
     *  - Returns an array of "ID" and "Header" JSON objects that meet the search criteria.
     *  - The resultset is wrapped in a "data": {} JSON object.
     *  - Accepts a single "Keys" JSON object that contains an array of one or more JSON objects containing search criteria. 
     *  - This search is composite, allowing the resultset to be further refined by adding additional key / value pairs in JSON format.
     *  - Seach criteria are case-insensitive. 
     *
     * For example:
     *      {
     *           "keys":[
     *               {"1": "K5"},
     *               {"4": "adult"}
     *           ]
     *       }
     *  - will return a list of nodes with an ICD10 code like "K5" that also have a title like "adult"       
     *  - note the lookup key is represented as an integer. To see all available looup keys, refer to the lookup keys documentation.  
     *
     * SQL:
     *  - The SQL uses INNER JOINS to retrieve resultsets. An empty resultset may result from:
     *      - an invalid key id.
     *      - no content nodes contain an index key that matches the value supplied.
     * 
     * @return \Illuminate\Http\Response as JSON
     */
    public function search(ContentFormRequest $request) {
        $keys = array($request->get('keys'));
        $counter = 0;

        $sql  =  "SELECT DISTINCT (`tContent`.`ID`), `tContent`.`Header`";
        $sql .= " FROM `tlookupkey`";
        $sql .= " INNER JOIN `tcontentlookup` ON `tlookupkey`.`uuid` = `tcontentlookup`.`key_uuid`";
        $sql .= " INNER JOIN `tContent` ON `tcontentlookup`.`nodeID` = `tContent`.`ID`";

        if (count($keys[0]) > 0) {
            foreach($keys[0] as $key) {
                $counter ++;
                $arr = array_keys($key);

                $name = $arr[0];
                $value = $key[$name];

                if ($counter == 1) {
                    $sql .= " WHERE `tcontentlookup`.`nodeID` IN (SELECT `tcontentlookup`.`nodeID`";
                    $sql .= " FROM `tcontentlookup`";
                    $sql .= " WHERE `key_uuid` = " . trim($name) ;
                    $sql .= " AND LOWER(`value`) LIKE LOWER('%" .trim($value) . "%'))";
                } else {
                    $sql .= " AND `nodeID` IN (SELECT `nodeID`";
                    $sql .= " FROM `tcontentlookup`";
                    $sql .= " WHERE `key_uuid` = " . trim($name);
                    $sql .= " AND LOWER(`value`) LIKE LOWER('%" . trim($value) . "%'))";
                }
            }
        }
        
        return response()->json(['data'=>DB::select(DB::raw($sql))], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display content
     *
     * Displays the following fields:
     *  - Parent_ID
     *  - Header
     *  - Content
     *
     * Note:
     *  - The Content field contains HTML markup.
     *  - Currently all images embedded in the content have invalid URLs. This will be corrected once a location has been established to house all images and - in the future - other media formats.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response as JSON
     */
    public function show($id)
    {
        $content = $this->content->select('Parent_ID', 'Header', 'Content')->findOrFail($id);

        return response()->json(['data'=>$content], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
