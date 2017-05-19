<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\NestebleProjectTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes,NestebleProjectTrait;

    protected $table = 'Project';
    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['Parent_ID','name','description','ContentStart_ID','user_created','user_updated','user_deleted'];

    
    public function user(){
    	return $this->belongsTo(\App\Models\User::class,'user_created');
    }
     public function childs(){
        return $this->hasMany(\App\Models\Project::class,'Parent_ID');
    }
    public function nodes(){
    	return $this->hasMany(\App\Models\Project::class,'Parent_ID');
    }

    public function users(){
        return $this->belongsToMany(\App\Models\User::class,'users_projects','project_id','user_id');
    }

    public function projectable(){
        return $this->morphTo();
    }

    public function parent(){
        return $this->belongsTo(\App\Models\Project::class,'uuid');
    }
    public function projects(){
        return $this->morphMany(\App\Models\Project::class,'projectable');
    }
    public function content(){
        return $this->belongsTo(\App\Models\Project::class,'Parent_ID');
    }

    public function pdf(){
        return $this->belongsTo(\App\Models\File::class,'ContentStart_ID');
    }

}
