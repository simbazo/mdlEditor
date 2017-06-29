<?php

namespace App\Models\Farms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model
{
	use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['farm_type_id','farm_name','contact_person','size','phone','email','country_id','province','city','address_line1','address_line2','logo','postal_code','user_created','user_updated','user_deleted'];

    public function farmtype(){
    	return $this->belongsTo(\App\Models\Farms\FarmType::class,'farm_type_id');
    }

    public function farm(){
    	$farms = $this->all();
    	$farmList = [];

    	foreach ($farms as $key) {
    		$farmList[$key->uuid] = $key->farm_name;
    	}

    	return $farmList;
    }
}
