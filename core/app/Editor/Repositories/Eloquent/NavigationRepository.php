<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\NavigationInterface;

/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class NavigationRepository extends BaseRepository implements NavigationInterface
{
	
	public function model(){
		return 'App\Models\Navigation';
	}

	 public function tree(){
    	return static::with(implode('.', array_fill(0,100,'children')))->where('parent_id','=',NULL)->get();
    }
}