<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['list_id','name','description','user_created','user_deleted','user_updated'];

    public function type(){
    	return $this->belongsTo(\App\Models\ProductList::class,'list_id');
    }
}
