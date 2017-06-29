<?php namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller {

    /* 
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $loginPath = '/auth/login';
    protected $redirectPath = '/';

    use AuthenticatesUsers;


    protected $auth;
    //protected $username = 'username';

    /**
     * @param Guard $auth
     * @param Registrar $registrar
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'logout']);
    }

     public function login(){
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        // get our login input
        $login = $request->input('login');
        // check login field
        $login_type = filter_var( $login, FILTER_VALIDATE_EMAIL ) ? 'email' : 'username';
        // merge our login field into the request with either email or username as key
        $request->merge([ $login_type => $login ]);
        // let's validate and set our credentials
        if ( $login_type == 'email' ) {
            $this->validate($request, [
                'email'    => 'required|email',
                'password' => 'required',
            ]);
            $credentials = $request->only( 'email', 'password' );
        } else {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]);
            $credentials = $request->only( 'username', 'password' );
        }
        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect()->intended($this->redirectPath);
        }
        return redirect()->back()
            ->withInput($request->only('login', 'remember'))
            ->withErrors([
                'login' => 'Username or password is incorrect',
            ]);
    }

     public function logout(){
        \Session::forget('tree');
        Auth::logout();
        return redirect('auth/login');
    }

}
