<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumberSetting extends Model
{
    protected $primaryKey = 'uuid';

    protected $fillable = ['content_start_id','project_start_id'];
}
