<?php

namespace App\Models\Manufacture;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $primaryKey = 'uuid';

    protected $fillable = ['name','email','phone','logo','country_uuid',
    'province','town','address1','address2','postal_code','user_created','user_updated'
    ];

    public function country(){
    	return $this->belongsTo(\App\Models\Forms\Country::class,'country_uuid');
    }

     public function apiSearch(){
        $term = \Request::get('data');
        $manufacture = $this->where('name', 'LIKE', '%'.$term.'%')->limit(200)->get();
        $results = array();
        foreach($manufacture as $man){
            array_push($results, $man);
        }
        return response()->json(['data'=>$results],201);
    }
}
