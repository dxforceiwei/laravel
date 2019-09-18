<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class auth_common_user extends Controller
{
	public function index()
    {
        if((Session::get('who') != "0")&&(Session::get('who') !="2"))
		return '<script>window.alert("你沒有權限");history.go(-1);</script>';
    }
}
