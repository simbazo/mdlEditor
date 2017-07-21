<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivationToken;
use App\Events\UserRequestedActivationEmail;
/**
 * @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
 */
class ActivationController extends Controller
{
    
    public function activate(ActivationToken $token){

    	$token->user()->update([
    		'active'=>true
    	]);

    	$token->delete();

    	auth()->login($token->user);


    	return redirect('/');
    }

    public function resend(Request $request){
    	$user = User::byEmail($request->get('email'))->firstOrFail();

    	if($user->active){
    		return redirect('/');
    	}

    	event(new UserRequestedActivationEmail($user));

    	return redirect('/login')->withInfo('Activation email resent.');
    }
}
