<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class auth_superuser extends Controller
{
    public function index()
    {
        if((Session::get('who') != "1")&&(Session::get('who') !="3"))
		return '<script>window.alert("你沒有權限");history.go(-1);</script>';
    }
}
