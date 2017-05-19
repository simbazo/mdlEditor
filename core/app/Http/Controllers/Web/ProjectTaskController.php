<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskFormRequest;
use App\Editor\Repositories\Contracts\UserInterface as Users;
use App\Editor\Repositories\Contracts\ProjectInterface as Project;
use App\Editor\Repositories\Contracts\ProjectTaskInterface as Task;
class ProjectTaskController extends Controller
{
    protected $tasks,$users,$projects;

    public function __construct(Task $tasks,Users $users,Project $projects){
        $this->tasks = $tasks;
        $this->users = $users;
        $this->projects = $projects;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->tasks->all();
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //selectProject
        $users = $this->users->selectUser();
        $project = $this->projects->selectProject();
        return view('tasks.create',compact('project','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskFormRequest $request)
    {
         $data = [
            'task_title'=>$request->get('task_title'),
            'project_id'=>$request->get('project_id'),
            'content_start_id' =>$request->get('content_start'),
            'description'      =>$request->get('description')  
        ];

        $task = $this->tasks->create($data);

        if($task){
            $users = null;
        }
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
    public function update(TaskFormRequest $request, $id)
    {
        $data = [
            'task_title'=>$request->get('task_title'),
            'project_id'=>$request->get('project_id'),
            'content_start_id' =>$request->get('content_start'),
            'description'      =>$request->get('description')  
        ];

        $task = $this->tasks->updateById($id,$data);
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
