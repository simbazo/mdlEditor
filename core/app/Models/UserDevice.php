<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    protected $primaryKey = 'uuid';

    protected $fillable = ['user_uuid','device_uuid','model','platform','version','manufacturer'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
