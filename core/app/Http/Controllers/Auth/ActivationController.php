<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
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

    public function otp($otp){

        $otp = ActivationToken::where('otp',$otp)->first();


        if(!count($otp)){
            return response()->json(['errors'=>"The OTP provided is incorrect!"],422);
        }

        $otp->user()->update([
            'active' =>true 
            ]);

        $otp->delete();

        auth()->login($otp->user);

        $token = JWTAuth::fromUser(auth()->user());

        return response()->json(['token' =>$token,'user'=>auth()->user()],201);
    }

    public function resend(Request $request){
    	$user = User::byEmail($request->get('email'))->firstOrFail();
        $activation = ActivationToken::where('user_uuid',$user->uuid)->get();

        if(!count($activation)){
           $user->activationToken()->create([
            'token' => str_random(128),
            'otp'   => mt_rand(100000, 999999)
            ]);
       }

       
       if($user->active){
          return redirect('/');
      }

      event(new UserRequestedActivationEmail($user));

    	//return redirect('/login')->withInfo('Activation email resent.');
      return response()->json(['msg'=>'Activation email resent'],201);
  }
}
