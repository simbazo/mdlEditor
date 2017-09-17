<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
 */
class SocialLoginController extends Controller
{

    public function __construct(){
        
        $this->middleware(['social','guest']);
    }

    public function redirect($service, Request $request)
    {
    	return Socialite::driver($service)->redirect();
    }

    public function callback($service, Request $request)
    {
    	$serviceUser = Socialite::driver($service)->user();

    	$user = $this->getExistingUser($serviceUser,$service);

    	if(!$user){
    		$split = explode(" ", $serviceUser->getName());
    		$user = User::create([
    			'first_name'	=>array_shift($split),
    			'last_name'		=>implode(" ", $split),
    			'email'			=>$serviceUser->getEmail(),
    			'active'		=>false
    		]);
    	}

    	if($this->needsToCreateSocial($user, $service)){
    		$user->social()->create([
    			'social_uuid'	=>$serviceUser->getId(),
    			'service'		=>$service
    		]);
    	}

    	auth()->login($user, false);

    	return redirect()->intended();
    }

    protected function needsToCreateSocial(User $user, $service)
    {
    	return !$user->hasSocialLinked($service);
    }

    protected function getExistingUser($serviceUser, $service)
    {
    	return User::where('email',$serviceUser->getEmail())->orWhereHas('social', function ($q) use ($serviceUser, $service){

    		$q->where('social_uuid',$serviceUser->getId())->where('service',$service);

    	})->first();
    }
}
	