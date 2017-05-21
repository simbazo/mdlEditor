<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;
use App\Editor\Repositories\Contracts\ProjectInterface as Project;
class ProjectsController extends Controller
{
    protected $project;

    public function __construct(Project $project){
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = $this->project->all();
        return response()->json($project);
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
    public function store(ProjectFormRequest $request)
    {
        $data = [
            'name'              =>$request->get('name'),
            'description'       =>$request->get('description'),
            'logo'              =>$request->get('logo'),
            'app_logo'          =>$request->get('app_logo'),
            'short_description' =>$request->get('short_description'),
            'long_description'  =>$request->get('long_description'),
            'active'            =>$request->get('active')      
        ];

        $project = $this->project->create($data);

        if($project)
            return response()->json(['project'=>$project],201);
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
