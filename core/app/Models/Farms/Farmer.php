<?php

namespace App\Models\Farms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farmer extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'first_name','last_name','id_number','dob',
    	'gender_id','race_id','phone','email','country_id',
    	'province','city','address_line1','address_line2','postal_code',
    	'user_created','user_updated','user_deleted'
    ];


    public function gender(){
    	return $this->belongsTo(\App\Models\Forms\Gender::class,'gender_id');
    }

    public function race(){
    	return $this->belongsTo(\App\Models\Forms\Race::class,'race_id');
    }

    public function country(){
        return $this->belongsTo(\App\Models\Forms\Country::class,'country_id');
    }
    public function farm(){
        return $this->belongsToMany(\App\Models\Farms\Farm::class,'farmer_farms','farmer_id','farm_id');
    }
}
