<?php

namespace App\Models\Sponsors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SponsorType extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','user_creatd','user_updated','user_deleted'];

    public function sponsor(){
    	return $this->hasMany(\App\Models\Sponsors\Sponsor::class,'uuid','sponsor_type_id');
    }
    public function types(){
    	$types = $this->all();
    	$typesList = [];

    	foreach ($types as $key) {
    		$typesList[$key->uuid] = $key->name;
    	}

    	return $typesList;
    }
}
