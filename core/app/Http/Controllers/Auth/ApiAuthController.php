<?php namespace App\Http\Controllers\Auth;

use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{UserFormRequest, UserProfileRequest};
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Models\ActivationToken;
use Illuminate\Foundation\Auth\RegistersUsers;
/**
* @author  [Jacinto Joao] <[<email address>]>
*/
class ApiAuthController extends Controller
{
	use RegistersUsers;
	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function index(){
		$users = $this->user->all();

		return response()->json($users);
	}

	public function signup(UserFormRequest $request){

		$data = [
			'first_name'=>$request->get('first_name'),
			'last_name'	=>$request->get('last_name'),
			'dob'		=>$request->get('dob'),
			'sex_uuid'	=>$request->get('sex_uuid'),
			'email'=>$request->get('email'),
			'mobile'	=>$request->get('phone'),
			'username'=>$request->get('username'),
			'password'=>bcrypt($request->get('password'))
		];

		$user = $this->user->create($data);

		//$device = $this.device($user,$request);

		if($user)
			return   $this->registered($user);
		else
			return response()->json(['msg'=>'something went wrong'],400);
	}

	public function device($user, $request){
		return $user->device()->create([
			'device_uuid'	=>$request->get('device_uuid'),
			'model'			=>$request->get('model'),
			'platform'		=>$request->get('platform'),
			'version'		=>$request->get('version'),
			'manufacturer'	=>$request->get('manufacturer')
		]);
	}

	protected function registered($user){

		auth()->logout();

		return response()->json(['msg'=>'Your account was created successful, please check your email for activation'],201);
	}



	public function authenticate(Request $request){

		$this->validate($request, [
			'email'		=>'required|email',
			'password'	=>'required'
		]);

		$credentials = $request->only('email','password');
		try{
			$token = JWTAuth::attempt($credentials);

			if(!$token){
				return response()->json(['error'=>'Your Email or password is incorrect'],401);
			}
		}
		catch(JWTException $e)
		{
			return response()->json(['error'=>'something went wrong'],500);
		}
		$user = auth()->user();

		if(count($user->device())){
			$device = $user->device()->where('device_uuid',$request->get('device_uuid'))->first();
			if(!count($device) && !empty($request->get('model')) ){
				$this->device($user, $request);
			}
		}else{
			if(!empty($request->get('model'))){
				$this->device($user, $request);
			}
		}

		if(!$user->hasActivatedAccount()){
			auth()->logout();

			return response()->json(['error'=>'Please activate your account. <a href="'.route('auth.activate.resend').'?email='.$user->email. '">Resend</a>'],403);
		}

		return response()->json(['token' =>$token,'user'=>$user], 200);
	}

	public function profile(){
		$user = JWTAuth::parseToken()->toUser();
		//$profile = User::where('uuid',$user->uuid)->with('sex')->get();
		return response()->json(['data'=>$user],201);
	}

	public function update(UserProfileRequest $request){
		$user = JWTAuth::parseToken()->toUser();

		$user->first_name = $request->get('first_name');
		$user->last_name  = $request->get('last_name');
		$user->mobile 	  = $request->get('phone');
		$user->dob 		  = $request->get('dob');
		$user->sex_uuid   = $request->get('gender');
		$user->save();

		if($user)
			return response()->json([
				'data'	=>$user
			],201);	
		else
			return response()->json([
				'error'=>trans('application.record_failed')
			],503);

	}

	public function changePassword(Request $request){
		$otp = ActivationToken::where('otp',$request->get('otp'))->first();
		if(!count($otp)){
			return response()->json(['error'=>"The OTP provided is incorrect!"],422);
		}else{
		$otp->delete();
		$otp->user()->update([
			'password'=>bcrypt($request->get('password'))
		]);

			return response()->json([
				'success' =>true
			],201);
		}
	}

	/*305 47 strand street 0718854924 */


}

