<?php

namespace App\Http\Controllers\defaults;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class news extends Controller
{
    public function index()
    {
        $currentPage = "/traffic_system/public/defaults/news";
		$maxRows_Recordset1 = 20;
		$pageNum_Recordset1 = 0;		
		
		if (isset($_GET['pageNum_Recordset1'])) 
		{
		  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
		}
		$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
		
		
        $query_Recordset1 = DB::select("SELECT * FROM `news_add` ORDER BY id desc LIMIT ".$startRow_Recordset1.",".$maxRows_Recordset1);
		
		if (isset($_GET['totalRows_Recordset2'])) 
		{
		  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
		} 
		else 
		{
		  $totalRows_Recordset2 = DB::table('news_add')->orderBy('id','desc')->count();
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
		
		return view('defaults/news')
		->with('all', $query_Recordset1)
		->with('startRow_Recordset1',$startRow_Recordset1)
		->with('maxRows_Recordset1',$maxRows_Recordset1)
		->with('totalRows_Recordset2',$totalRows_Recordset2)
		->with('totalPages_Recordset1',$totalPages_Recordset1)
		->with('pageNum_Recordset1',$pageNum_Recordset1)
		->with('queryString_Recordset1',$queryString_Recordset1)
		->with('currentPage',$currentPage);
    }
}
