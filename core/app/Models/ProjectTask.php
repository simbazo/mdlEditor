<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTask extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'uuid';
    protected $fillable =['title','status','description','priority','user_created','user_updated','user_deleted'];

    public function user(){
    	return $this->belongsTo(\App\Models\User::class,'user_created');
    }
}
 