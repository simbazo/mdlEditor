<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\ProductListInterface;

/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class ProductListRepository extends BaseRepository implements ProductListInterface
{
	
	public function model(){
		return 'App\Models\ProductList';
	}

	public function lists(){
		$lists = $this->all();
		$listList = [];

		foreach ($lists as $key) {
		 	$listList[$key->uuid] = $key->name;
		 } 
		 return $listList;
	}
}