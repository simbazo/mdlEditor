<?php

namespace App\Http\Controllers\Web;
use DB;
use App\Models\Project as Pro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PContentFormRequest;
use App\Editor\Repositories\Contracts\ContentInterface as Content;
use App\Editor\Repositories\Contracts\ProjectInterface as Project;
use App\Editor\Repositories\Contracts\ProjectContentInterface as PContent;
use App\Editor\Repositories\Contracts\FileInterface as File;
class ProjectsContentController extends Controller
{ 
    protected $pcontent,$project,$content, $file;

    public function __construct(PContent $pcontent,Project $project,Content $content, File $file){
        $this->pcontent = $pcontent;
        $this->project  = $project;
        $this->content  = $content;
        $this->file     = $file;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = $this->pcontent->all();
        return view('projectcontent.index',compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $project = $this->project->selectProject();
        return view('projectcontent.create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PContentFormRequest $request)
    {
        $data = $request->all();
        $data['user_created'] = auth()->user()->uuid;

        if($this->content->create($data)){
            flash()->success(trans('application.record_created'));
            return response()->json(['succcess'=>true,'msg'=>trans('application.record_failed')],201);
        }

        flash()->error(trans('application.record_failed'));
        return response()->json(['success'=>false,trans('application.record_failed')],400);
    }
 
    public function _content($id = null){
        $project_id = $id;
        if(!$id == null)
         $content = $this->project->where('Parent_ID',$id)->orderBy('uuid','desc')->get();
     else
        $content = $this->project->all();

        
        #$count = count($content);
        
        return view('projectcontent.index',compact('content','project_id'));
    }

    public function Pcontent($id){
       
     $content = $this->project->where('Parent_ID',$id)->first();  
     $items = $this->project->where('Parent_ID','=',$id)->get();
     

    return view('projectcontent.fancytree',compact('items','content'));
    }

    public function content($id){
        \Session::put('urlKey',$id);
        $projects = $this->project->where('parent_id', '=', $id)->first();
        $allProjects = Pro::pluck('name','uuid')->all();

        $project_id = $id;
        $content = $this->project->where('Parent_ID',$id)->orderBy('uuid','desc')->first();

        if(!$content == null)
        $childs = Pro::where('Parent_ID',$content->uuid)->get();
    else
        $childs = ['uuid'=>1,'name'=>'There no content for the selected project','short_description'=>''];
        
        #$count = count($content);
        
        return view('projectcontent.fancytree',compact('content','project_id','childs','projects','allProjects'));
    }

    public function nodeUpdate(Request $request, $id){
        $data = [
            'name'=>$request->get('value')
        ];

        if($this->project->updateById($request->get('pk'),$data))
            return response()->json(['success'=>true,'msg'=>trans('application.record_updated')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);
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
        $contents = $this->content->where('ContentStart_ID',$id)->first();
        #$count = count($content);
        return view('projectcontent.content',compact('contents'));
    }

    public function tr($id){
   

    return $childs = $this->project->where('Parent_ID',$id)->get();
     
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PContentFormRequest $request, $uuid)
    {
      $data = $request->all();

      if($this->content->updateById($uuid,$data))
        return response()->json(['success'=>true,'msg'=>trans('application.record_updated')],201);
    else
        return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);
           

       
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
