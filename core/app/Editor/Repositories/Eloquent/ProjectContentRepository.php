<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\ProjectContentInterface;

/**
*@author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class ProjectContentRepository extends BaseRepository implements ProjectContentInterface
{
	
	public function model(){
		return 'App\Models\ProjectContent';
	}
}