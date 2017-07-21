<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivationToken extends Model
{
    protected $primaryKey = 'uuid';

    protected $fillable = ['token','otp'];


    public function  getRouteKeyName(){
    	
    	return 'token';
    }
    
    public function user(){
    	return $this->belongsTo(\App\Models\User::class,'user_uuid');
    }
}
