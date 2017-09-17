<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{	
	protected $table = 'users_social';
    protected $primaryKey = 'uuid';

    protected $fillable = ['social_uuid','service','user_uuid'];
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
