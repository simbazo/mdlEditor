<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\FileInterface;

/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class FileRepository extends BaseRepository implements FileInterface
{
	
	public function model(){
		return 'App\Models\File';
	}
}

