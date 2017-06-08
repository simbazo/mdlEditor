<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
	
	protected $primaryKey = 'uuid';
	
	protected $fillable = ['name','code','status','user_created','user_deleted','user_updated'];


	public function selectCountries(){
		$countries = $this->all();
		$countriesList = [];

		foreach ($countries as $country) {
			$countriesList[$country->uuid] = $country->name;
		}
		return $countriesList;
	}

	public function farmer(){
		return $this->hasMany(\App\Models\Farms\Farmer::class,'uuid','country_id');
	}
	public function farm(){
		return $this->hasMany(\App\Models\Farms\Farm::class,'uuid','country_id');
	}
	public function ngos(){
		return $this->hasMany(\App\Models\Ngos\Ngo::class,'uuid','country_id');
	}
	
	public function sponsor(){
		return $this->hasMany(\App\Models\Sponsors\Sponsor::class,'uuid','country_id');
	}

}
