<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\ContentInterface;

/**
* @author [Jacinto Joao] <[<jjoao@besidecod.com>]>
*/
class ContentRepository extends BaseRepository implements ContentInterface
{
	
	public function model(){
		return 'App\Models\Content';
	}



}