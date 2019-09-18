@extends('layouts.superuser.default')

@php
$div1 = 0;
@endphp

@section('main')
	<form method="post" name="form1" enctype="multipart/form-data">
	{{ csrf_field() }}
		<article class="post">
			<header>
				<div class="title">
					<h2>新增消息</h2>
					<p>{{date("Y-m-d")}}</p>
				</div>
			</header>
			<div class="row" align="left" id="div4">
				<div class="col-25">
					<label for="kind" id="kind">種類</label>
				</div>
				<div class="col-75" align="left">
					<select name="kind">
					  <option value="">請選擇</option>
					  <option value="產品資訊">產品資訊</option>
					  <option value="系統">系統</option>
					  <option value="活動">活動</option>
					</select>
				</div>
			</div>
			<div class="row" align="left">
				<div class="col-25">
					<label for="title" id="title">標題名稱</label>
				</div>
				<div class="col-75" align="left">
					<input type="text" name="title" size="32" value="">
				</div>
			</div>
			<div class="row" align="left">
				<div class="col-25">
					<label for="subject" id="subject">公告</label>
				</div>
				<div class="col-75">
					<textarea name="subject" placeholder="Write something.." style="height:200px"></textarea>
				</div>
			</div>
			<div class="row" align="left">
				<div class="col-25">
					<label for="video">影片</label>
				</div>
				<div class="col-75">
					<input type="text" name="video" size="32" placeholder="https://www.youtube.com/watch?v=......，請貼等於後面的英數字" value="">
				</div>
			</div>
			</br>
			<?php 
			for($a=1;$a<4;$a++)
			{
			?>
			<div class="row" align="left">
				<div class="col-25">
					<label for="include">附件{{$a}}</label>
				</div>
				<div class="col-75">
					<input type="file" name="include{{$a}}" >
				</div>
			</div>
			<?php 
			} 
			?>
			</br>
			<footer style="display:unset" align="right">						
				<div class="row">
					<div class="col">
						<input name="submit" type="submit" value="送出" onclick="return confirm('確認送出?')">								
						<input type="hidden" name="MM_insert" value="form1">
					</div>
				<div>
			</footer>
		</article>					
	</form>
@endsection