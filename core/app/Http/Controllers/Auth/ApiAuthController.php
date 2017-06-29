<?php namespace App\Http\Controllers\Auth;

use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Editor\Repositories\Contracts\UserInterface as User;

/**
* @author  [Jacinto Joao] <[<email address>]>
*/
class ApiAuthController extends Controller
{
	
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
			'name'=>$request->get('name'),
			'email'=>$request->get('email'),
			'username'=>$request->get('username'),
			'password'=>bcrypt($request->get('password'))
		];

		$user = $this->user->create($data);

		if($user)
			return response()->json(['user'=>$user],201);
		else
			return response()->json(['msg'=>'something went wrong'],400);
	}

	public function authenticate(Request $request){

		$credentials = $request->only('email','password');

		try{
			$token = JWTAuth::attempt($credentials);

			if(!$token){
				return response()->json(['error'=>'Invalid Credentials'],401);
			}
		}
		catch(JWTException $e)
		{
			return response()->json(['error'=>'something went wrong'],500);
		}

		return response()->json(['token' =>$token], 200);
	}	



}

