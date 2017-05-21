<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Editor\Repositories\Contracts\ProjectInterface as Project;
class TreeController extends Controller
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

    public function treeView(){       
        $Categorys = Category::where('parent_id', '=', 0)->get();
        $tree='<ul id="browser" class="filetree"><li class="tree-view"></li>';
        foreach ($Categorys as $Category) {
             $tree .='<li class="tree-view closed"<a class="tree-name">'.$Category->name.'</a>';
             if(count($Category->childs)) {
                $tree .=$this->childView($Category);
            }
        }
        $tree .='<ul>';
        // return $tree;
        // 
        $projects = $this->project->all();
        return view('dashboard',compact('tree','projects'));
    }

    public function childView($Category){                 
            $html ='<ul>';
            foreach ($Category->childs as $arr) {
                if(count($arr->childs)){
                $html .='<li class="tree-view closed"><a class="tree-name">'.$arr->name.'</a>';                  
                        $html.= $this->childView($arr);
                    }else{
                        $html .='<li class="tree-view"><a class="tree-name">'.$arr->name.'</a>';                                 
                        $html .="</li>";
                    }
                                   
            }
            
            $html .="</ul>";
            return $html;
    } 
}
