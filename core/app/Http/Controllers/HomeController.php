<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editor\Repositories\Contracts\ProjectInterface as Project;
class HomeController extends Controller
{
    protected $project;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->middleware('auth');

        $this->project = $project;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $projects = $this->project->where('Parent_ID',0)->get();
        return view('navigator.index',compact('projects'));
    }

    public function projects(){
        
    }
}
