<?php

namespace App\Http\Controllers\FormsApi;

use App\Models\UserDevice as Devices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\UsersHelperController as Helper;

class DevicesApiController extends Controller
{
	protected $helper;

	public function __construct(Helper $helper){
		$this->helper = $helper;
	}
	
    public function index(){
    	$devices = Devices::where('user_uuid',$this->helper->user())->get();

    	return response()->json([
    		'data'	=>$devices
    	],201);
    }
}
