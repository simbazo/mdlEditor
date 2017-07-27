<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Sex extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';

    protected $fillable = ['sex_uuid','user_created','user_updated','user_deleted'];

    public function user(){
    	return $this->hasMany(User::class,'uuid','sex_uuid');
    }
}
