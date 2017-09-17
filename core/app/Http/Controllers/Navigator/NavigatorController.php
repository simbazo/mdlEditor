<?php

namespace App\Http\Controllers\Navigator;

use App\Models\{Content, Project};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;

class NavigatorController extends Controller
{
    public function index(){
    	return view('navigator.content');
    }

    public function create()
    {
    	return view('navigator.create');
    }

     public function store(ProjectFormRequest $request)
    {
        $data = $request->all();
        $data['Parent_ID'] = $request->get('Parent_ID');
        $data['user_created'] = auth()->user()->uuid;

        if(Project::create($data)){
            flash()->success(trans('application.record_created'));

            return response()->json(['success'=>true,'msg'=>trans('application.record_created')],201);
        }
        flash()->error(trans('application.record_failed'));
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);

    }

    public function edit($id){
    	$project = Project::findOrFail($id);
        $content = Project::where('Parent_ID','=',$id)
                ->orderBy('uuid','desc')
                ->get();

        $sub = Content::where('ContentStart_ID', $id)->get();

    return view('navigator.content',compact('content','project','sub'));
    }

    public function show($id)
    {	
        $project = Project::findOrFail($id);
    	return view('navigator.create',compact('project'));
    }


   
}
