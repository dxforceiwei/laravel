<?php

namespace App\Http\Controllers\superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class index extends Controller
{
    public function index()
    {
        $query_Recordset1 = DB::select("SELECT distinct `number` FROM `query_common_user` ORDER BY id desc");
			
		foreach($query_Recordset1 as $query_Recordset){
			$query_Recordset1_2 = DB::select("SELECT * FROM `query_common_user` WHERE `number`=\"".$query_Recordset->number."\" ORDER BY id desc");
		}
		foreach($query_Recordset1_2 as $query_Recordset2){
			$qu_Recordset1 = DB::select("SELECT * FROM `query_common_user` WHERE `company`=\"".$query_Recordset2->company."\" AND `number`=\"".$query_Recordset2->number."\" ORDER BY id ASC");
		}
		return view('superuser/index')->with('number', $query_Recordset1)->with('main', $query_Recordset1_2)->with('main2', $qu_Recordset1);
    }

    public function store(Request $request)
    {
		
    }

    public function show($id)
    {
        //
    }
}
