<?php

namespace App\Models\ICG;

use Illuminate\Database\Eloquent\Model;

class IcgUser extends Model
{
    protected $primaryKey = 'uuid';

    protected $fillable = ['first_name','last_name','email','age','sex','dob','role','level','device_id','app_id', 'province', 'country'];

     public function ActivationToken(){
        return $this->hasOne(IcgActivation::class,'user_uuid');
    } 

    public function hasActivatedAccount() {
        return $this->active;
    }
}