<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editor\Repositories\Contracts\NavigationInterface as Navigation;

class NavigationsController extends Controller
{
	protected $navigation;

	public function __construct(Navigation $navigation){
		$this->navigation = $navigation;
	}

    public function welcome(){
    	$items = $this->navigation->tree();

    	return view('templates._master')->withItems($items);
    }
}
