<?php

namespace App\Models\Sponsors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponsor extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';

    protected $fillable = ['sponsor_type_id','sponsor_name',
    'phone','email','country_id','province','city','address_line1','address_line2','postal_code','user_created','user_updated','user_deleted'];

    public function types(){
    	return $this->belongsTo(\App\Models\Sponsors\SponsorType::class,'sponsor_type_id');
    }
}
