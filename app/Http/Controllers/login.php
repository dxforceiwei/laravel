<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class login extends Controller
{
    public function index(Request $request)
    {
		if(!empty($request->cookie('username')) && !empty($request->cookie('password')))
		{	
			$MM_fldUserAuthorization = "";
			$MM_redirecttoReferrer = false;
			$LoginRS__query=DB::select("SELECT `username`, `password`, `permission`, `company`, `buy`, `fix`, `submit` FROM `admin` WHERE username='".$request->cookie('username')."' AND password=PASSWORD('".base64_decode($request->cookie('password'))."')");
			return $this->show($LoginRS__query,$request->username,$request);
		}
		else
		{
			return view('login');
		}
    }
	
	public function store(Request $request)
    {
        if (isset($_GET['accesscheck'])) 
		{
			Session::put('PrevUrl', $_GET['accesscheck']);
		}
		if (isset($request->username) && isset($request->password)) 
		{	
			$loginUsername=$request->username;
			$username = $request->username;
			$password = $request->password;
			$MM_fldUserAuthorization = "";
			$MM_redirecttoReferrer = false;
			$LoginRS__query=DB::select("SELECT `username`, `password`, `permission`, `company`, `buy`, `fix`, `submit` FROM `admin` WHERE username='".$loginUsername."' AND password=PASSWORD('".$password."')");
			
			return $this->show($LoginRS__query,$loginUsername,$request);
		}
    }
	
    public function show($LoginRS__query,$loginUsername,$request)
    {
		
		if(count($LoginRS__query))
		{
			//$attempt = Auth::guard('admin')->attempt(['username'=>$request->username, 'password'=>$request->password]);
			\Cookie::queue("username", $request->username, 1440);
			\Cookie::queue("password", $request->password, 1440);
			\Cookie::queue("message", "1", 1440);
			Session::put('company_name', $LoginRS__query[0]->company);
			Session::put('user', $LoginRS__query[0]->username);
			$insertSQL = DB::table('log')->insert(['log'=>Session::get('company_name')."的".Session::get('user')."於".date("Y-m-d ")."登入", 'path'=>"login.php"]);
		
			/*防止一般使用者與管理者使用URL導入非該身分的介面的判斷機制*/
			Session::put('buy', $LoginRS__query[0]->buy);
			Session::put('fix', $LoginRS__query[0]->fix);
			Session::put('submit', $LoginRS__query[0]->submit);
		}
		if (count($LoginRS__query) && $LoginRS__query[0]->permission == "common_user") 
		{
			Session::put('who', 1);
		}
		else if (count($LoginRS__query) && $LoginRS__query[0]->permission=="superuser") 
		{
			Session::put('who', 0);
		}
		else if (count($LoginRS__query) && $LoginRS__query[0]->permission=="manager") 
		{
			Session::put('who', 2);
		}
		else if (count($LoginRS__query) && $LoginRS__query[0]->permission=="user") 
		{
			Session::put('who', 3);
		}
		if (count($LoginRS__query) && $LoginRS__query[0]->permission == "common_user") 
		{
			$loginStrGroup = "";
			
			
			Session::put('MM_Username', $loginUsername);
			Session::put('MM_UserGroup', $loginStrGroup);      

			if (Session::has('PrevUrl') && false) 
			{
				$MM_redirectLoginSuccess_superuser = Session::get('PrevUrl'); 
			}
			
			return Redirect::to('common_user/index');
		}
		else if (count($LoginRS__query)&& $LoginRS__query[0]->permission=="user" ) 
		{
			$loginStrGroup = "";

			
			Session::put('MM_Username', $loginUsername);
			Session::put('MM_UserGroup', $loginStrGroup);        

			if (Session::has('PrevUrl') && false) 
			{
				$MM_redirectLoginSuccess_superuser = Session::get('PrevUrl'); 
			}
			return Redirect::to('common_user/index');
		}
		else if (count($LoginRS__query) && (($LoginRS__query[0]->permission=="superuser")||($LoginRS__query[0]->permission=="manager")) ) 
		{
			$loginStrGroup = "";
			
			Session::put('MM_Username', $loginUsername);
			Session::put('MM_UserGroup', $loginStrGroup);       

			if (Session::has('PrevUrl') && false) 
			{
				$MM_redirectLoginSuccess_superuser = Session::get('PrevUrl'); 
			}
			return Redirect::to('superuser/index');
		}
		else
		{
			DB::table('log')->insert(['log'=>$request->username."登入失敗", 'path'=>"login.php"]);
			return "<script type=\"text/javascript\">alert(\"帳號密碼錯誤\");</script>";
		}
    }
}
