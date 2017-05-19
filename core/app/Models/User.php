<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','avatar','description','phone'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function project(){
        return $this->hasMany(\App\Models\Project::class,'uuid','user_created');
    }
    public function projects(){
        return $this->hasMany(\App\Models\Project::class,'uuid','user_id');
    }

    public function content(){
        return $this->hasMany(\App\Models\ProjectContent::class,'uuid','user_created');
    }
}
