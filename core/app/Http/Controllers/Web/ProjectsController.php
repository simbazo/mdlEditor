<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;
use App\Editor\Repositories\Contracts\UserInterface as Users;
use App\Editor\Repositories\Contracts\ProjectInterface as Project;
class ProjectsController extends Controller
{

    protected $project,$users;

    public function __construct(Project $project,Users $users){
        $this->project = $project;
        $this->users   = $users; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->project->where('active',1)->where('Parent_ID',1)->get();

        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->users->selectUser();
        return view('projects.create',compact('users'));
    }

    public function createStartPoint($id){

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectFormRequest $request)
    {
        $data = $request->all();
        $data['user_created'] = auth()->user()->uuid;

        if($this->project->create($data)){
            flash()->success(trans('application.record_created'));

            return response()->json(['success'=>true,'msg'=>trans('application.record_created')],201);
        }
        flash()->error(trans('application.record_failed'));
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);

    }

    public function projectDropDownData($id){
        $dropdown = $this->project->where('Parent_ID',$id)
                                 ->orderBy('name', 'asc')
                                 ->get();
            return response()->json($dropdown);
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
    public function update(ProjectFormRequest $request, $id)
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
