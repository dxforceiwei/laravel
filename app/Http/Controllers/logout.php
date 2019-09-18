<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Cookie;
class logout extends Controller
{
    public function index()
    {
		\Cookie::queue(\Cookie::forget('username'));
		\Cookie::queue(\Cookie::forget('password'));
		\Cookie::queue(\Cookie::forget('message'));
        session()->forget('MM_Username');
        session()->forget('MM_UserGroup');
        session()->forget('PrevUrl');
        session()->forget('username');
        session()->forget('password');
        session()->forget('car');
        session()->forget('car_count');
		$insertSQL = DB::table('log')->insert(['log'=>Session::get('company_name')."的".Session::get('user')."於".date("Y-m-d ")."登出", 'path'=>"logout.php"]);
		return redirect('/login');
    }
}
