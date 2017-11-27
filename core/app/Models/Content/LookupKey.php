<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LookupKey extends Model
{
    use SoftDeletes;
    protected $table = 'lookupkey';
    protected $primaryKey = 'uuid';
    protected $dates =['deleted_at'];
   
    protected $fillable = ['key', 'user_created','user_updated','user_deleted'];
}