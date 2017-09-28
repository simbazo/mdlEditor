<?php

namespace App\Models\ICG;

use Illuminate\Database\Eloquent\Model;

class IcgActivation extends Model
{
    protected $primaryKey = 'uuid';

    protected $fillable = ['token','pin'];


    public function  getRouteKeyName(){
    	
    	return 'token';
    }
    
    public function user(){
    	return $this->belongsTo(IcgUser::class,'user_uuid');
    }
}
