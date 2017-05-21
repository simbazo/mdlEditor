<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\ProductInterface;

/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class ProductRepository extends BaseRepository implements ProductInterface
{
	
	public function model(){
		return 'App\Models\Product';
	}
}