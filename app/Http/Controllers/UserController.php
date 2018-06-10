<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\User;
use Session;
use Cookie;
class UserController extends Controller
{
    public function signUpForm()
    {
        return view('signUp');
    }

    public function signInForm()
    {
        return view('signIn');
    }

    public function signUp(Request $request)
    {
        $user = new User();
        $user->usename = $request->usename;
        $user->password = md5($request->password);
        $user->family = $request->family;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->state = $request->state;
        $user->city = $request->city;
        if($user->save())
        {
            $result = 'success';
            return view('signIn',compact('result'));

        }
    }

    public function signIn(Request $request)
    {
        $usename = $request->usename;
        $password = md5($request->password);
        if(isset($request->rememberMe))
            $remember = $request->rememberMe;
        //$result = DB::select('select username from users where username =".$user." and password =".$password" ');
        $user = DB::table('users')->where([['usename','=',$usename] ,['password','=',$password]])->get();
        if(count($user)>=1)
        {
            Session::put('username', $usename);
            $cookie = cookie::forever('usename', $usename);
            return Redirect::to('/')->cookie($cookie);
        }
        else{
            return back();
        }
    }

    public function checkUsername(Request $request)
    {
        $user = new User();
        $usename = trim($request->username);
       // $result = DB:: select("select * from users where username =  '.$username.' ");
        $user = DB::table('users')->where('usename',$usename)->get();
        foreach ($user as $us)
            $name = $us->family;
        if(count($user)>0)
        {
            return response()->json(['success'=>'این نام کاربری قبلا انتخاب شده'],200);
        }
        else
        {
            return response()->json(['error'=>''],404);
        }
    }
}
