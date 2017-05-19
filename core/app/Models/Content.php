<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Content extends Model
{
    use SoftDeletes;
    protected $table = 'Content';
    protected $primaryKey = 'ID';
    protected $dates =['deleted_at'];

    protected $fillable = ['Parent_ID','Level_ID','SortOrder','Type_ID','Indexing','Header','Content','Final','Finalised','ContentStart_ID','Reference','Description','Topic','Icon_path','VersionKey','Type_details','user_created','user_updated','user_deleted'];

    public function project(){
    	return $this->hasMany(\App\Models\Project::class,'ID','ContentStart_ID');
    }
}
