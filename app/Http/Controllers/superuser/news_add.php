<?php

namespace App\Http\Controllers\superuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use \Exception;

class news_add extends Controller
{
    public function index()
    {
        return view('superuser/news_add');
    }

    public function store(Request $request)
    {
        if(!empty($request->kind) &&
		   !empty($request->title) &&
		   !empty($request->subject))
		{
			$newfile1 = null;	
			$newfile2 = null;	
			$newfile3 = null;		
			$path = null; 
			
			
			if ($_FILES['include1']['size'] > 0) 
			{
				$path_parts = pathinfo($_FILES['include1']['name']);
				$path="../resources/images/news/";
				$newfile1= $path_parts["basename"];
				@unlink($path.$newfile1);
			}
			if ( $_FILES["include2"]["size"] > 0) 
			{
				$path_parts = pathinfo($_FILES['include2']['name']);
				$path="../resources/images/news/";
				$newfile2= $path_parts["basename"];
				@unlink($path.$newfile2);
			}
			if ( $_FILES["include3"]["size"] > 0) 
			{
				$path_parts = pathinfo($_FILES['include3']['name']);
				$path="../resources/images/news/";
				$newfile3= $path_parts["basename"];			
				@unlink($path.$newfile3);
			}
			
			DB::table('news_add')->insert(
						['date' => date("Y-m-d"),
						'kind' => $request->kind,
						'title' => $request->title,
						'subject' => $request->subject,
						'video' => $request->video,
						'filename1' => $newfile1,
						'filesize1' => $_FILES['include1']['size'],
						'filetype1' => $_FILES['include1']['type'],
						'filepath1' => $path.$newfile1,
						'filename2' => $newfile2,
						'filesize2' => $_FILES['include2']['size'],
						'filetype2' => $_FILES['include2']['type'],
						'filepath2' => $path.$newfile2,
						'filename3' => $newfile3,
						'filesize3' => $_FILES['include3']['size'],
						'filetype3' => $_FILES['include3']['type'],
						'filepath3' => $path.$newfile3]
			);	
			
			if ($_FILES['include1']['size'] > 0) 
			{
				move_uploaded_file($_FILES["include1"]["tmp_name"],$path.$newfile1);
			}
			if ( $_FILES["include2"]["size"] > 0) 
			{
				move_uploaded_file($_FILES["include2"]["tmp_name"],$path.$newfile2);
			}
			if ( $_FILES["include3"]["size"] > 0) 
			{
				move_uploaded_file($_FILES["include3"]["tmp_name"],$path.$newfile3);
			}
			
			DB::table('log')->insert(['log'=>$request->Session::get('company_name')."的".Session::get('user')."於".date("Y-m-d ")."發布標題為".$request->title."的最新消息", 'path'=>"superuser/news_add"]);

			return Redirect::to('defaults/news');
		}
		else
		{
			return "<script>alert('資料不完全');</script>";
		}
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
