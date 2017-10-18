<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageImpression extends Model
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];

    protected $fillable = ['date', 'user_uuid', 'application_uuid', 'device_uuid', 'node_uuid',
    						'user_created', 'user_updated', 'user_deleted'];

     public function Application(){
        return $this->hasOne(Application::class,'application_uuid');
    }
}
