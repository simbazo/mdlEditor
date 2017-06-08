<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Models\Shared\Country as Countries;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
	protected $countries;

	public function __construct(Countries $countries){
		$this->countries = $countries;
	}

    public function index(){
    	$countries = $this->countries->select(['uuid','name'])->get();

    	return response()->json($countries);
    }
}
