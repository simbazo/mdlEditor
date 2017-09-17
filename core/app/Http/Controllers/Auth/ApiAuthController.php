<?php namespace App\Http\Controllers\Auth;

use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
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

		if($user)
			return   $this->registered($user);
		else
			return response()->json(['msg'=>'something went wrong'],400);
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

/*305 47 strand street 0718854924 */


}

