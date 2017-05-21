<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductList extends Model
{
    protected $primaryKey = 'uuid';

    protected $dates = ['deleted_at'];
    protected $fillable = ['name','user_created','user_updated','user_deleted'];

    public function question(){
    	return $this->hasMany(\App\Models\Question::class,'uuid','list_id');
    }
}
