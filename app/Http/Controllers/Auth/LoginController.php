<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $loginData=$request->only('email','password');
//        return response()->json($loginData,200);

        if(!isset($loginData['email'])||!isset($loginData['password']))
        {
            return response()->json("Email Or Password Incorrect",401);
        }
        else
        {
            $pass=User::where('email','=',$loginData['email'])->first();
            if($pass)
            {
                if(hash('sha256',$loginData['password'])==$pass->password) {
                    $customClaims = ["email"=>$pass->email];
                    $token =JWTAuth::fromUser($pass,$customClaims);
                    return response()->json(["msg"=>"login Success!","token"=>$token,"user"=>$pass],200);
                }
                else
                {
                    return response()->json("Email Or Password Incorrect",401);
                }
            }
            else
            {
                return response()->json("Email Or Password Incorrect",401);
            }

        }
    }
}
