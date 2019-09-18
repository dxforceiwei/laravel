<?php

namespace App\Http\Controllers\superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class fix_main extends Controller
{
    public function index()
    {
		$currentPage = "/traffic_system/public/superuser/fix_main";
		$maxRows_Recordset1 = 50;
		$pageNum_Recordset1 = 0;	
		
		if (isset($_GET['pageNum_Recordset1'])) 
		{
		  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
		}
		$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
		
		$query_Recordset1 = DB::select("SELECT distinct `number` FROM `fix_common_user` ORDER BY id desc LIMIT ".$startRow_Recordset1.",".$maxRows_Recordset1);
			
		foreach($query_Recordset1 as $query_Recordset){
			$query_Recordset2_2 = DB::select("SELECT * FROM `fix_common_user` WHERE `number`=\"".$query_Recordset->number."\" ORDER BY id desc");
		}
		
		if (isset($_GET['totalRows_Recordset2'])) 
		{
		  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
		} 
		else 
		{
		  $totalRows_Recordset2 = DB::table('fix_common_user')->select('number')->distinct()->orderBy('id','desc')->count();
		}
		$totalPages_Recordset1 = ceil($totalRows_Recordset2/$maxRows_Recordset1)-1;

		$queryString_Recordset1 = "";
		if (!empty($_SERVER['QUERY_STRING'])) 
		{
		  $params = explode("&", $_SERVER['QUERY_STRING']);
		  $newParams = array();
		  foreach ($params as $param) 
		  {
			if (stristr($param, "pageNum_Recordset1") == false && 
				stristr($param, "totalRows_Recordset2") == false) 
			{
			  array_push($newParams, $param);
			}
		  }
		  if (count($newParams) != 0) 
		  {
			$queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
		  }
		}
		$queryString_Recordset1 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset1);
		
		return view('superuser/fix_main')->with('number', $query_Recordset1)
		->with('main', $query_Recordset2_2)
		->with('startRow_Recordset1',$startRow_Recordset1)
		->with('maxRows_Recordset1',$maxRows_Recordset1)
		->with('totalRows_Recordset2',$totalRows_Recordset2)
		->with('totalPages_Recordset1',$totalPages_Recordset1)
		->with('pageNum_Recordset1',$pageNum_Recordset1)
		->with('queryString_Recordset1',$queryString_Recordset1)
		->with('currentPage',$currentPage);
    }

    public function store(Request $request)
    {
		
    }

    public function show($id)
    {
        //
    }
}
