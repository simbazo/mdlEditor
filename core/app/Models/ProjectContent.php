<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProjectContent extends Model
{
	use SoftDeletes;


	protected $primaryKey = 'uuid';
	protected $dates = ['delected_at'];
    protected $table = 'ProjectContent';

    protected $fillable = ['name','description','logo','app_logo','short_description','long_description','active','user_created','user_updated','user_deleted','Project_ID','ContentStart_ID'];

    public function project(){
    	return $this->belongsTo(\App\Models\Project::class,'Project_ID');
    }
    public function user(){
    	return $this->belongsTo(\App\Models\User::class,'user_created');
    }
}
