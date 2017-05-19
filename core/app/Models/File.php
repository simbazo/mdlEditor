<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SOftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','node_id','user_created','user_updated','user_deleted'];

    public function content(){
    	return $this->hasMany(\App\Models\Project::class,'node_id','ContentStart_ID');
    }
}
