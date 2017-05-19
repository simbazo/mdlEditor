<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\ProjectTaskInterface;

/**
* @author [Jacinto Joao] <[<jjoao@besidecod.com>]>
*/
class ProjectTaskRepository extends BaseRepository implements ProjectTaskInterface
{
	
	public function model(){
		return 'App\Models\ProjectTask';
	}
}