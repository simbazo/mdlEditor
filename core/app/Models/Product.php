<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    #protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['product_name','description','user_created','user_updated','user_deleted'];

    public function producType(){
    	return $this->belongsTo(\App\Models\ProductType::class,'product_type_id');
    }

    public function questions(){
        return $this->belongsToMany(\App\Models\Question::class,'product_questions','product_id','question_id');
    }
}
