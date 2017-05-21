<?php

namespace App\Http\Controllers\Editor\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Editor\Repositories\Contracts\ProjectInterface as Node;
use App\Editor\Repositories\Contracts\ContentInterface as Content;
class ProjectController extends Controller
{
    protected $request,$node,$content;
    public function __construct(Request $request,Node $node,Content $content){
        $this->request = $request;
        $this->node = $node;
        $this->content = $content;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = $this->request->get('page',1);
        $perPage = 20;
        $projects = Project::find(65);

        $childs = $projects->nestedProject($projects->uuid,$page, $perPage);

        $childs = new LengthAwarePaginator(
            $childs,
            count($projects->projects->where('Parent_ID',$projects->uuid)),
            $perPage,
            $page,
            ['path'=>$this->request->url(),'query'=>$this->request->query()]    
            );

        /**
         * @author [Jacinto Joao] <[<jjoao@besidecod.com>]>
         * $childs = $projects->projects()->with(['childs'])->get();
         * above the right query solution, which must be implemented on table
         */
        $childsnode = 'abc';
        return view('editor.projects.index',compact('projects','childs','childsnode'));
    }

    public function getNode($id){

        $parent = $this->node->getById($id);
        return view('projectcontent.createnode',compact('parent'));
    }

    public function storeNode(Request $request){
        $data = [
            'Parent_ID' => $request->get('Parent_ID'),
            'name'      => $request->get('name'),
            'description'=>$request->get('description'),
            'projectable_id'=>$request->get('Parent_ID'),
            'projectable_type'=>'App\Models\Project',
            'user_created'    =>auth()->user()->uuid,
            'ContentStart_ID' => $this->node->generateProjectNum() 
        ];

        $project = $this->node->create($data);

        if($project){
            $contentData = [
            'Header' => $project->name,
            'Description'=>$project->description,
            'ContentStart_ID'=>$project->ContentStart_ID
            ];

            $content = $this->content->create($contentData);
        }


        return response()->json(['success'=>true,'redirectTo'=>route('projectcontent.edit',$content->ContentStart_ID),'project'=>$project],201);

    }
    public function json(){
        $page = $this->request->get('page',1);
        $perPage = 200;
        $projects = Project::find(65);

        $childs = $projects->nestedProject($projects->uuid,$page, $perPage);

        /*
        $childs = new LengthAwarePaginator(
            $childs,
            count($projects->projects->where('Parent_ID',$projects->uuid)),
            $perPage,
            $page,
            ['path'=>$this->request->url(),'query'=>$this->request->query()]    
            );*/

        return response()->json($childs);
    }
    public function json2(){
        
        $projects = $this->node->where('Parent_ID',65)->get();

        return response()->json($projects);
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
