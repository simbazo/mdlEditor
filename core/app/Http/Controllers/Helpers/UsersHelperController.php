<?php

namespace App\Http\Controllers\Helpers;

use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class UsersHelperController extends Controller
{
    public function user(){

    	$user = JWTAuth::parseToken()->toUser();

    	return $user->uuid;
    }
}
