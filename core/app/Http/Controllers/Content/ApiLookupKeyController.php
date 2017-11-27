<?php
namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Content\LookupKeyFormRequest;
use App\Models\Content\LookupKey;

/**
 * @resource Lookup keys
 *
 * Lookup keys are used to index the content table. The each node in the content tabkle may have multiple lookup keys that index the content in a myriad of ways. For example, a content node that contails a particular drug package insert may be indexed with one or more of the following lookup keys (in addition to any other relevant lookup keys):
*   - ICD10 code
*   - ATC code
*   - Nappi code
*
* Lookup keys act as a mechanism to quickly locate content relevant to a particular API content search.
*/
class ApiLookupKeyController extends Controller
{
    protected $lookupkey;

    public function __construct(LookupKey $lookupkey){
        $this->lookupkey = $lookupkey;
    } 

    /**
     * List all lookup keys
     *
     * Notes:
     *  - Returns an array of "uuid" and "key" JSON objects.
     *  - The resultset is wrapped in a "data": {} JSON object.
     *
     * @return \Illuminate\Http\Response as JSON
     */
    public function index() 
    {
        $lookupkey = $this->lookupkey->select(['uuid','key'])->orderBy('key','asc')->get();
        return response()->json(['data'=>$lookupkey], 201);
    }

     /**
     * Search for lookup keys
     *
     * Display an alphabetical list of keys and uuids that match the search criterion.
     *
     * Notes:
     *  - Returns an array of "uuid" and "key" JSON objects that meet the search criteria.
     *  - The resultset is wrapped in a "data": {} JSON object.
     *  - Accepts a single "keys" JSON object that a string value.
     *  - The database performs a wilcard search. For example, a search for 'pl' may return, 'please', 'apple' and 'maple'.
     *
     * @return \Illuminate\Http\Response as JSON
     */
    public function search(LookupKeyFormRequest $request) {
        $lookupkey = $this->lookupkey->select('uuid','key')->where('key', 'LIKE', '%'. trim($request->get('key')) .'%')->orderBy('key','asc')->get();
        return response()->json(['data'=>$lookupkey], 201);
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
    public function store(LookupKeyFormRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(LookupKeyFormRequest $request, $id)
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
