<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\ProductTypeInterface;

/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class ProductTypeRepository extends ProductTypeInterface
{
	
	public function model(){
		return 'App\Models\ProductType';
	}
}