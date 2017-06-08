<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['short_name','long_name','email','phone','fax','address_id','contact_person_fname','contact_person_lname','contact_person_email','contact_person_cell','user_created','user_updated','user_deleted'];

    public function address(){
    	return $this->belongsTo(\App\Models\Forms\Address::class,'address_id');
    }

    public function user(){
    	return $this->belongsTo(\App\Models\User::class,'user_created');
    }

    public function product(){
        return $this->hasMany(\App\Models\Product::class,'uuid','client_id');
    }
}
