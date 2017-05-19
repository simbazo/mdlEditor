<?php namespace App\Traits\Eloquent;
/**
 * @author [Jacinto Joao] <[<jjoao@besidecod.com>]>
 * @copyright [MidigitalLife | Editor2 Project]
 */
trait NestebleProjectTrait {

	public function nestedProject($id,$page =1, $perPage = 20){

		$projects = $this->projects();


		$grouped = $projects->get()->groupBy('Parent_ID');

		$root = $grouped->get($id)->forPage($page, $perPage);

		$ids = $this->buildIdNest($root, $grouped);	

		$grouped = $projects->whereIn('uuid',$ids)->with(['nodes.nodes.nodes.nodes.nodes.nodes.nodes'])->get()->groupBy('Parent_ID');

		$root = $grouped->get($id);

		return $this->buildNest($root,$grouped);
	}

	protected function buildIdNest($root, $grouped,&$ids = []){

		foreach($root as $project){
			$ids[] = $project->uuid;

			if($nodex = $grouped->get($project->uuid)){
				$this->buildIdNest($nodex,$grouped,$ids);
			}
		}
  
		return $ids; 
	}

	protected function buildNest($projects, $groupedProjects)
	{
		return $projects->each(function ($project) use ($groupedProjects) {

			if ($nodex = $groupedProjects->get($project->uuid)) {

				$project->children = $nodex;
				$this->buildNest($project->children, $groupedProjects);	
			}
		}); 
	}
}