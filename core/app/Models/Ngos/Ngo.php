<?php

namespace App\Models\Ngos;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ngo extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'uuid';

    protected $fillable = ['ngo_type','acronym','name','contact_person','phone','email','country_id','province','city','address_line1','address_line2','logo','postal_code','user_created','user_updated','user_deleted'];

    public function ngotype(){
    	return $this->belongsTo(\App\Models\Ngos\NgoType::class,'ngo_type');
    }

    public function countries(){
    	return $this->belongsTo(\App\Models\Forms\Country::class);
    }
}
