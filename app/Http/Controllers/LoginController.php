<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view("loginpage");
    }

    public function validate_credetial(Request $request){
        $username = $request->input('username');
     	$password = $request->input('password');
        // return "username : ".$username.", password : ".$password;

        $validate = false;
        $check = DB::table('user')->where('username',$username)->get();
        foreach($check as $c) {
            if ($c->password == $password) {
                session_start();
                $_SESSION['auth'] = $c->auth;
                $_SESSION['name'] = $c->name;
                $_SESSION['username'] = $c->username;
                $_SESSION['user_id'] = $c->user_id;
                $_SESSION['is-user-logged'] = true;
                
                return redirect('/organization/');

            } else {
                return redirect('/');
            }
        }
    }

    public function logout(){
        session_start();
        unset($_SESSION["auth"]);
        unset($_SESSION["name"]);
        unset($_SESSION["username"]);
        unset($_SESSION["user_id"]);
        unset($_SESSION["is-user-logged"]);
        session_destroy();
        return redirect('/');
    }
}
