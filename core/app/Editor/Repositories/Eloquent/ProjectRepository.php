<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\ProjectInterface;

/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class ProjectRepository extends BaseRepository implements ProjectInterface
{
	
	public function model(){
		return 'App\Models\Project';
	}


	public function generateProjectNum(){
        $project = $this->model();
        $last = $project::orderBy('uuid', 'desc')->first();
        if($last){
            $next_id = $last->ContentStart_ID+1;
        }else{
            $next_id = 1;
        }

        return $next_id;
    }

	public function selectProject(){
		$projects = $this->all();
		$listProject = [];

		foreach ($projects as $project) {
			$listProject[$project->uuid] = $project->name;
		}

		return $listProject;

	}
}