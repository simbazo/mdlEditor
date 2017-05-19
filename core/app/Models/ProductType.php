<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','user_created','user_updated','user_deleted'];


    public function product(){
    	return $this->hasMany(\App\Models\Product::class,'uuid','product_type_id');
    }
}
