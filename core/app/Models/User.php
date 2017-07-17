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
        'username','first_name', 'last_name', 'email', 'mobile', 'password',
        'secret_question', 'secret_answer', 'description', 'avatar',
        'sex', 'dob', 'user_created','user_updated','user_deleted'
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

    /**
     * Get the sex associated with the user
    */
    public function sex()
    {
        return $this->belongsTo(\App\Models\Sex::class, 'uuid','sex_uuid');
    }
}
