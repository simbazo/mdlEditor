<?php

namespace App\Http\Controllers\Web;

use Session;
use App\Models\Content as Cont;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentFormRequest;
use App\Editor\Repositories\Contracts\ProjectInterface as Project;
use App\Editor\Repositories\Contracts\ContentInterface as sContent;
class ContentController extends Controller
{
    protected $content,$project;

    public function __construct(sContent $content,Project $project){
        $this->content = $content;
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uuid)
    {
        $content = $this->content->where('Parent_ID',$uuid)->get();

        return view('navigator.content',compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tree.partials.inline');
    }
    public function inline(){
        return view('tree.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentFormRequest $request)
    {
        $data = $request->all();
        $data['collapse'] = str_random(4);
        $data['user_created'] = auth()->user()->uuid;

        if($this->content->create($data)){
            flash()->success(trans('application.record_created'));
            return response()->json(['success'=>true,'msg'=>trans('application.record_created')],201);
        }
         flash()->error(trans('application.record_failed'));
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],201);
    }

    public function ckeditor(){
    $CKEditor = Input::get('CKEditor');
    $funcNum = Input::get('CKEditorFuncNum');
    $message = $url = '';
    if (Input::hasFile('upload')) {
        $file = Input::file('upload');
        if ($file->isValid()) {
            $filename = $file->getClientOriginalName();
            $file->move(storage_path().'/images/', $filename);
            $url = public_path() .'/images/' . $filename;
        } else {
            $message = 'An error occured while uploading the file.';
        }
    } else {
        $message = 'No file uploaded.';
    }
    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
    public function preview($uuid){
        $preview = $this->content->getById($uuid);

        return view('projectcontent.partials._preview',compact('preview'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        
        /*$project = $this->project->getById($uuid);
        $tree_name = $project->name;
        $tree_id = $project->ID;*/
        $content = $this->content->where('Parent_ID',$uuid)->get();

        return view('tree.index',compact('content','categories','allCategories','project'));
    }

    public function content($id){
        $content = $this->content->getById($id);
        return view('tree.content',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $data = [
            'Content' =>$request->Content
        ];

        $data['user_updated'] = auth()->user()->uuid;

        if($this->content->updateById($uuid,$data))
            return response()->json(['success'=>true,'msg'=>trans('content updated')],201);
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

    public function treeView($id){       
        $content = $this->content->where('project_id', '=', $id)->get();
        $tree='<ul id="browser" class="filetree"><li class="tree-view"></li>';
        foreach ($content as $content) {
             $tree .='<li class="tree-view closed"<a class="tree-name">'.$content->name.'</a>';
             if(count($content->childs)) {
                $tree .=$this->childView($content);
            }
        }
        $tree .='<ul>';
        // return $tree;
        return view('files.treeview',compact('tree'));
    }
}
