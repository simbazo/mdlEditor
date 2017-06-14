<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['country_id','province','city','address_line1','address_line2','postal_code','user_created','user_updated','user_deleted'];

    public function user(){
    	return $this->belongsTo(\App\Models\User::class,'user_created');
    }
}
