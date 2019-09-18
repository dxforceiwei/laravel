<!DOCTYPE html lang="zh-TW">
	<script>
		function getCookie(cname) {
			var name = cname + "=";
			var decodedCookie = decodeURIComponent(document.cookie);
			var ca = decodedCookie.split(';');
			for(var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		function checkCookie() {
			var user=getCookie("username");
			var password=getCookie("password");
			var success=getCookie("success");
			if ((user != "") && (password != "") && (success =="1")) {
				window.location.href = 'superuser/index';
			} 
		}
		
		//給menu tree 使用
		var toggler = document.getElementsByClassName("caret");
		var i;

		for (i = 0; i < toggler.length; i++) {
			toggler[i].addEventListener("click", function() {
			this.parentElement.querySelector(".nested").classList.toggle("active");
			this.classList.toggle("caret-down");
		  });
		}
	</script>
    <head>
		@php
		header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
		header("Pragma: no-cache"); //HTTP 1.0
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		//or, if you DO want a file to cache, use:
		header("Cache-Control: max-age=2592000"); 
		@endphp
        <title>政亮企業-經銷系統</title>
		<meta name="Description" content="政亮企業-經銷系統">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{asset('CSS/mystyle.css')}}" async>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" href="{{asset('assets_main/css/main.css')}}"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
		<link rel="icon" href="{{asset('images/logo.png')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('CSS/main.css')}}" async>	
		<link href="{{asset('CSS/sm-core-css.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('CSS/sm-blue.css')}}" rel="stylesheet" type="text/css" />
		<style>
		@yield('style')
		body {
			min-width: none;
			max-width: none;
			margin: 8px auto;
		}
		input[type=number] {
		  width: 80px;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  resize: vertical;
		}

		input[type=text], select {
		  width: 100%;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  resize: vertical;
		}


			@media screen and (max-width: 980px) {
				input[type=text], select {
				  width: 100%;
				}
			}

		input[type=textarea]  {
		  width: 100%;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  resize: vertical;
		}

		label {
		  padding: 12px 12px 12px 0;
		  display: inline-block;
		}

		input[type=submit], input[type=button]  {	  
		  color: white;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}

		.container {
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 20px;
		}

		.col {
		  float: left;
		  width: 100%;
		  margin-top: 6px;
		}

		.col-25 {
		  float: left;
		  width: 40%;
		  margin-top: 6px;
		}

		.col-75 {
		  float: left;
		  width: 60%;
		  margin-top: 6px;
		}

		/* Clear floats after the columns */
		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		@media screen and (max-width: 600px) {
		  .col-25 {
			width: 100%;
		  }
		  .col-75 {
			width: 100%;
		  }
		  .row {
			  content: "";
			  display: inline;
			  clear: both;
			}
		}

		@media screen and (max-width: 600px) {
		  .footer-25, .footer-75 {
			margin-top: 0;
		  }
		}
		
		@media screen and (max-width: 500px) {
		  .navbar a {
			float: none;
			display: inline;
		  }
		}
		.post > footer {
			display: inline-table;
		}
		#p-grid {
			max-width: 1200px;
			margin: 0 auto;
			display: grid;
			/* Width of columns */
			grid-template-columns: 1fr 1fr 1fr 1fr;
		}
		#p-grid2 {
			max-width: 1200px;
			margin: 0 auto;
			display: grid;
			/* Width of columns */
			grid-template-columns: 1fr 1fr;
		}
		div.p-grid-in 
		{
			box-sizing: border-box;
			margin: 5px; 
			padding: 10px;
			border: 1px solid #e8f0ff;
			background: #f2f7ff;
		}
		img.p-img 
		{
			width: 100%;
			height: auto;
		}
		div.p-name 
		{
			font-weight: bold;
			font-size: 1.1em;
		}
		div.p-price 
		{
			color: #f44242;
		}
		div.p-desc 
		{
			color: #888;
			font-size: 0.9em;
		}
		button.p-add 
		{
			background: #e8f0ff;
			color: #fff;
			border: none;
			width: 100%;
			margin: auto;
			font-size: 0.15em;
			font-weight: bold;
			cursor: pointer;
		}
		/* Responsive */
		@media only screen and (max-width: 1024px) 
		{
			#p-grid 
			{ 
				grid-template-columns: 1fr 1fr 1fr; 
			}
			#p-grid2
			{ 
				grid-template-columns: 1fr 1fr; 
			}
		}
		@media only screen and (max-width: 600px) 
		{
			#p-grid 
			{ 
				grid-template-columns: 1fr 1fr; 
			}
			#p-grid2
			{ 
				grid-template-columns: 1fr; 
			}
		}
		.floating_ck
		{
			position:fixed;
			right:0%;
			top:50%;
		}
		.floating_ck dl dd
		{
			position:relative;
			width:80px;
			height:80px;
			background-color:#646577;
			border-bottom:solid 1px #555666;
			text-align:center;
			background-repeat:no-repeat;
			background-position:center 20%;
			cursor:pointer;
		}
		.floating_ck dl dd:hover
		{
			background-color:#e40231;
			border-bottom:solid 1px #a40324;
		}
		.floating_ck dl dd:hover .floating_left
		{
			display:block;
		}
		.quote
		{
			background-image:url(../images/cart.png);
		}
		.floating_ck dd span
		{
			color:#fff;display:block;padding-top:54px;
		}
		.floating_left
		{
			position:absolute;
			left:-160px;
			top:0px;
			width:160px;
			height:80px;
			background-color:#e40231;
			border-bottom:solid 1px #a40324;display:none;
		}
		.floating_left a
		{
			color:#fff;
			line-height:80px;
		}
		div.progressbar-wrapper
		{
			display: none;
		}
		</style>
    </head>
    <body class="is-preload">
	@php
	/*Line Notify 發送程序*/
	$initData['message'] = '';
	$token = '';
	$my_token = 'dMUhQqpfV7tEUJo6fH9W4HbUVT9pAEJWTtGm8joK1UP';		//政亮內部通知token

	function sendLineNotify($initData, $token,$url = 'https://notify-api.line.me/api/notify') {
		$ch = curl_init();
		$header[] = 'Authorization: Bearer';
		$header[] = $token;
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_HTTPHEADER => array(implode(' ',$header)),
			CURLOPT_POSTFIELDS => http_build_query($initData),
		));

		$result = curl_exec($ch);
		curl_close($ch); 
		$aResult = json_decode ($result, TRUE);
		return $aResult;
	}
	
	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) 
	{
	  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	/*預期工作日往後推9天，換算星期幾*/
	switch(date("N",strtotime('+9 day'))){
		case 1:
			$week = "(一)";
			break;
		case 2:
			$week = "(二)";
			break;
		case 3:
			$week = "(三)";
			break;
		case 4:
			$week = "(四)";
			break;
		case 5:
			$week = "(五)";
			break;
		case 6:		//週六不算 無條件進位
			$week = "(一)";
			break;
		case 7:		//週日不算 無條件進位
			$week = "(一)";
			break;
		default:
			break;
	}

	/*20天後星期幾，如遇到假日要增加天數*/
	switch(date("N",strtotime('+20 day'))){
		case 1:
			$week2 = "(一)";
			$date2 = date('Y-m-d ',strtotime('+20 day'));
			break;
		case 2:
			$week2 = "(二)";
			$date2 = date('Y-m-d ',strtotime('+20 day'));
			break;
		case 3:
			$week2 = "(三)";
			$date2 = date('Y-m-d ',strtotime('+20 day'));
			break;
		case 4:
			$week2 = "(四)";
			$date2 = date('Y-m-d ',strtotime('+20 day'));
			break;
		case 5:
			$week2 = "(五)";
			$date2 = date('Y-m-d ',strtotime('+20 day'));
			break;
		case 6:		//週六不算 無條件進位
			$week2 = "(一)";
			$date2 = date('Y-m-d ',strtotime('+22 day'));
			break;
		case 7:		//週日不算 無條件進位
			$week2 = "(一)";
			$date2 = date('Y-m-d ',strtotime('+21 day'));
			break;
		default:
			break;
	}

	/*維修截止日期用*/
	switch(date("N")){
		case 1:
			$week3 = "(一)";
			$date3 = date('Y-m-d ',strtotime('+10 day'));
			break;
		case 2:
			$week3 = "(二)";
			$date3 = date('Y-m-d ',strtotime('+10 day'));
			break;
		case 3:
			$week3 = "(三)";
			$date3 = date('Y-m-d ',strtotime('+10 day'));
			break;
		case 4:
			$week3 = "(四)";
			$date3 = date('Y-m-d ',strtotime('+12 day'));
			break;
		case 5:
			$week3 = "(五)";
			$date3 = date('Y-m-d ',strtotime('+12 day'));
			break;
		case 6:		//週六不算 無條件進位
			$week3 = "(一)";
			$date3 = date('Y-m-d ',strtotime('+10 day'));
			break;
		case 7:		//週日不算 無條件進位
			$week3 = "(一)";
			$date3 = date('Y-m-d ',strtotime('+9 day'));
			break;
		default:
			break;
	}
	@endphp
	<div id="wrapper" width="100%" align="left" valign="center" class="navbar">
		<header id="header">
			@if(Session::get('who')=="1") 
				<h1><a href="{{ url('common_user/index') }}" class="logo">政亮企業股份有限公司</a></h1>
			@elseif(Session::get('who')=="3")				
				<h1><a href="{{ url('defaults/news') }}" class="logo">政亮企業股份有限公司</a></h1>
			@elseif(Session::get('who')=="0" || Session::get('who')=="2")
				<h1><a href="{{ url('superuser/fix_main') }}" class="logo">政亮企業股份有限公司</a></h1>
			@endif
				<nav class="links">
				<ul id="main-menu" class="sm sm-blue">		<!--//下拉式menu tree 需要ID與class-->
				@if(Session::get('who')=="1" || Session::get('who')=="3")	<!--//經銷商-->
					<li><a href="{{ url('defaults/news') }}"><i class="fas fa-satellite"></i>最新消息</a></li>
					<li><a>清單</a>
						<ul style="margin-left: 0em;padding-left: 0em;">
						@if((Session::get('who')=="1") && (Session::get('buy')== 1))
							<li><a href="{{ url('common_user/index') }}"><i class="fa fa-fw fa-home"></i>訂購列表</a></li>
						@endif
						@if(Session::get('fix')== 1)
							<li style="margin-left: 0em;padding-left: 0em;"><a href="{{ url('common_user/fix_main') }}"><i class="fas fa-hammer"></i>查詢維修</a></li>
							@if(Session::get('who')=="1")
							<li style="margin-left: 0em;padding-left: 0em;"><a href="{{ url('common_user/service_show') }}"><i class="far fa-address-book"></i>保固清單</a></li>
							@endif
						@endif
						</ul>
					</li>			
					<li><a href="{{ url('default/query') }}"><i class="fa fa-fw fa-search"></i>快速查詢</a></li>
					@if((Session::get('who')=="1") && (Session::get('buy')== 1))
					<li><a href="{{ url('common_user/order_detail?booking_kind=電池') }}"><i class="fas fa-donate"></i>訂購</a></li>
					@endif
					@if(Session::get('fix')== 1)
					<li><a href="{{ url('common_user/fix_battery') }}"><i class="fa fa-fw fa-envelope"></i>申請維修</a></li>
					@endif
					@if((Session::get('who')=="1") && (Session::get('submit')== 1))
					<li><a href="{{ url('common_user/add_service') }}"><i class="fas fa-paperclip"></i>註冊保固</a></li>
					@endif
					<!--<li><a href="{{ url('superuser/log') }}../common_user/problem.php"><i class="far fa-question-circle"></i>常見問題</a></li>-->
					<li><a href="{{ url('common_user/contact_us') }}"><i class="fas fa-phone-square"></i>聯絡我們</a></li>
					<li><a href="{{ url('defaults/pwd') }}"><i class="fas fa-cog"></i>設定</a></li>
					<li><a href="{{ url('logout') }}"><i class="fa fa-fw fa-user"></i>登出</a></li>
				@else	<!--//管理權限-->
					<li><a>最新消息</a>
						<ul style="margin-left: 0em;padding-left: 0em;">
							<li><a href="{{ url('defaults/news') }}"><i class="fas fa-satellite"></i>最新消息</a></li>
							<li style="margin-left: 0em;padding-left: 0em;"><a href="{{ url('superuser/news_add') }}"><i class="fas fa-folder-plus"></i>發布消息</a></li>
						</ul>
					</li>
					<li><a>清單</a>
						<ul>				
							<li><a href="{{ url('superuser/index') }}"><i class="fa fa-fw fa-home"></i>訂購列表</a></li>
							<li style="margin-left: 0em;padding-left: 0em;"><a href="{{ url('superuser/fix_main') }}"><i class="fas fa-hammer"></i>維修管理</a></li>
							<li style="margin-left: 0em;padding-left: 0em;"><a href="{{ url('superuser/service_show') }}"><i class="far fa-address-book"></i>保固清單</a></li>		
						</ul>
					</li>	
					<li><a href="{{ url('defaults/query') }}"><i class="fa fa-fw fa-search"></i>快速查詢</a></li>
					<li><a href="{{ url('common_user/fix_battery') }}"><i class="fa fa-fw fa-envelope"></i>申請維修</a></li>
					<li><a>產品資訊</a>
						<ul style="margin-left: 0em;padding-left: 0em;">
							<li><a href="{{ url('superuser/product_list_main') }}"><i class="fas fa-cart-plus"></i>產品清單</a></li>
							<li style="margin-left: 0em;padding-left: 0em;"><a href="{{ url('superuser/list') }}"><i class="fas fa-list"></i>登錄產品型號</a></li>
							<li style="margin-left: 0em;padding-left: 0em;"><a href="{{ url('superuser/sn_num_list') }}"><i class="fas fa-sort-numeric-down"></i>型號管理</a></li>
						</ul>
					</li>
					@if(Session::get('submit')== 1)
						<li><a href="{{ url('common_user/add_service') }}"><i class="fas fa-paperclip"></i>註冊保固</a></li>
					@endif
					<li><a href="{{ url('superuser/chart') }}"><i class="far fa-chart-bar"></i>圖表</a></li>
					<li><a href="{{ url('defaults/pwd') }}"><i class="fas fa-cog"></i>設定</a></li>	
					@if(Session::get('who')=="0")	
							<li><a>最高管理</a>
								<ul style="margin-left: 0em;padding-left: 0em;">
									<li><a href="{{ url('superuser/user_main') }}"><i class="fas fa-id-card"></i>使用者管理</a></li>	
									<li style="margin-left: 0em;padding-left: 0em;"><a href="{{ url('superuser/log') }}"><i class="fas fa-book"></i>日誌</a></li>	
								</ul>
							</li>
					@endif
					<li><a href="{{ url('logout') }}"><i class="fa fa-fw fa-user"></i>登出</a></li>
				@endif
				</ul>
			</nav>			
			<nav class="main">
				<ul style="padding: 0;">
					<!--
					<li class="search">
						<a class="fa-search" href="{{ url('superuser/log') }}#search">Search</a>
						<form id="search" method="get" action="#">
							<input type="text" name="query" placeholder="Search" />
						</form>
					</li>
					-->
					<li class="menu">
						<a class="fa-bars" href="{{ url('superuser/log') }}#menu">Menu</a>
					</li>
				</ul>
			</nav>			
		</header>
		<section id="menu">
			<section>
				<ul class="links">
				@if(Session::get('who')=="1" || Session::get('who')=="3")
					<li>
						<a href="{{ url('defaults/news') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-satellite"></i>最新消息</h3>
							<p>產品最新消息、網頁維修資訊</p>
						</a>
					</li>
					@if((Session::get('who')=="1") && (Session::get('buy')== 1))
						<li>
							<a href="{{ url('common_user/index') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<h3><i class="fa fa-fw fa-home"></i>訂購列表</h3>
								<p>查詢訂單明細</p>
							</a>
						</li>
					@endif
					@if(Session::get('fix')== 1)
					<li>
						<a href="{{ url('common_user/fix_main') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-hammer"></i>查詢維修</h3>
							<p>查詢維修明細</p>
						</a>
					</li>
					@endif
					@if(Session::get('who')=="1")
					<li>
						<a href="{{ url('common_user/service_show') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="far fa-address-book"></i>保固清單</h3>
							<p>查詢所有保固資料</p>
						</a>
					</li>
					@endif
					<li>
						<a href="{{ url('defaults/query') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fa fa-fw fa-search"></i>快速查詢</h3>
							<p>快速查詢您的訂單</p>
						</a>
					</li>
					@if((Session::get('who')=="1") && (Session::get('buy')== 1))			
						<li>
							<a href="{{ url('common_user/order_detail?booking_kind=電池') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<h3><i class="fas fa-donate"></i>訂購</h3>
								<p>電池、車用零件、轉接頭、電動車</p>
							</a>
						</li>
					@endif
					@if(Session::get('fix')== 1)
					<li>
						<a href="{{ url('common_user/fix_battery') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fa fa-fw fa-envelope"></i>申請維修</h3>
							<p>電池維修</p>
						</a>
					</li>
					@endif
					@if((Session::get('who')=="1") && (Session::get('submit')== 1))
						<li>
							<a href="{{ url('common_user/add_service') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<h3><i class="fas fa-paperclip"></i>註冊保固</h3>
								<p>購買產品後登錄註冊保固</p>
							</a>
						</li>
					@endif
					<!--<li>
						<a href="{{ url('common_user/problem') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="far fa-question-circle"></i>常見問題</h3>
							<p>在此網站中有遇到問題嗎?</p>
						</a>
					</li>-->
					<li>
						<a href="{{ url('common_user/contact_us') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-phone-square"></i>聯絡我們</h3>
							<p>有甚麼問題可以透過信箱方式聯絡我們</p>
						</a>
					</li>					
					<li>
						<a href="{{ url('defaults/pwd') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-cog"></i>設定</h3>
						</a>
					</li>
					<li>
						<a href="{{ url('logout') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fa fa-fw fa-user"></i>登出</h3>
						</a>
					</li>";
				@else		<!--//管理權限-->
					<li>
						<a href="{{ url('defaults/news') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-satellite"></i>最新消息</h3>
							<p>產品最新消息、網頁維修資訊</p>
						</a>
					</li>
					<li>
						<a href="{{ url('superuser/news_add') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-folder-plus"></i>發布消息</h3>
							<p>發布最新消息</p>
						</a>
					</li>
					<li>
						<a href="{{ url('superuser/index') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fa fa-fw fa-home"></i>訂購列表</h3>
							<p>查詢訂單明細</p>
						</a>
					</li>
					<li>
						<a href="{{ url('superuser/fix_main') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-hammer"></i>維修管理</h3>
							<p>查詢維修明細</p>
						</a>
					</li>
					<li>
						<a href="{{ url('superuser/service_show') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="far fa-address-book"></i>保固清單</h3>
							<p>查詢所有保固資料</p>
						</a>
					</li>
					<li>
						<a href="{{ url('defaults/query') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fa fa-fw fa-search"></i>快速查詢</h3>
							<p>快速查詢您的訂單</p>
						</a>
					</li>
					<li>
						<a href="{{ url('superuser/product_list_main') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-cart-plus"></i>產品清單</h3>
							<p>新增/修改產品資訊與庫存</p>
						</a>
					</li>					
					<li>
						<a href="{{ url('superuser/list') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-list"></i>登錄產品型號</h3>
							<p>登錄賣出產品號碼</p>
						</a>
					</li>	
					<li>
						<a href="{{ url('superuser/sn_num_list') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-sort-numeric-down"></i>型號管理</h3>
							<p>管理型號內容</p>
						</a>
					</li>							
					@if(Session::get('submit')== 1)				
						<li>
							<a href="{{ url('common_user/add_service') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<h3><i class="fas fa-paperclip"></i>註冊保固</h3>
								<p>購買產品後登錄註冊保固</p>
							</a>
						</li>
					@endif
					<li>
						<a href="{{ url('superuser/chart') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="far fa-chart-bar"></i>圖表</h3>
							<p>檢視圖表</p>
						</a>
					</li>
					@if(Session::get('who')=="2")
							<li>
								<a href="{{ url('superuser/user_main') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
									<h3><i class="fas fa-id-card"></i>使用者管理</h3>
									<p>管理使用者權限</p>
								</a>
							</li>
					@endif						
					<li>
						<a href="{{ url('defaults/pwd') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fas fa-cog"></i>設定</h3>
							<p>設定帳戶</p>
						</a>
					</li>			
					@if(Session::get('who')=="0")
						<li>
							<a href="{{ url('superuser/log') }}../php" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<h3><i class="fas fa-book"></i>日誌</h3>
								<p>網站記錄</p>
							</a>
						</li>
					@endif	
					<li>
						<a href="{{ url('logout') }}" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
							<h3><i class="fa fa-fw fa-user"></i>登出</h3>
						</a>
					</li>
				@endif
				</ul>
			</section>
		</section>
	
		<div id="main">
			@yield('main')
			<section id="footer" style="text-align: center;">
				<ul class="icons">
					<li><a href="#"><img src="../images/line.png"/><span class="label">LINE</span></a></li>
					<li><a href="https://www.facebook.com/RelaxRide.Ebike/" class="fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="mailto:support@relaxrideebike.com" class="fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				<p class="copyright">&copy; 政亮企業股份有限公司</p>
			</section>			
		</div>
    </body>
	<script src="{{asset('Java/progress-bar.js')}}"></script>
	<script>
	ProgressBar.singleStepAnimation = 800;
	ProgressBar.init(
	  [ '收到訂單',
		'排程中',
		'組裝中',
		'排程檢測',
		'充放電檢測',
		'維修中',
		'出貨'
	  ],
	  '',
	  'progress-bar-wrapper0' // created this optional parameter for container name (otherwise default container created)
	);
	ProgressBar.init(
	  [ '收到訂單',
		'排程中',
		'組裝中',
		'排程檢測',
		'充放電檢測',
		'維修中',
		'出貨'
	  ],
	  '收到訂單',
	  'progress-bar-wrapper1' // created this optional parameter for container name (otherwise default container created)
	);
	ProgressBar.init(
	  [ '收到訂單',
		'排程中',
		'組裝中',
		'排程檢測',
		'充放電檢測',
		'維修中',
		'出貨'
	  ],
	  '排程中',
	  'progress-bar-wrapper2' // created this optional parameter for container name (otherwise default container created)
	);
	ProgressBar.init(
	  [ '收到訂單',
		'排程中',
		'組裝中',
		'排程檢測',
		'充放電檢測',
		'維修中',
		'出貨'
	  ],
	  '組裝中',
	  'progress-bar-wrapper3' // created this optional parameter for container name (otherwise default container created)
	);
	ProgressBar.init(
	  [ '收到訂單',
		'排程中',
		'組裝中',
		'排程檢測',
		'充放電檢測',
		'維修中',
		'出貨'
	  ],
	  '排程檢測',
	  'progress-bar-wrapper4' // created this optional parameter for container name (otherwise default container created)
	);
	ProgressBar.init(
	  [ '收到訂單',
		'排程中',
		'組裝中',
		'排程檢測',
		'充放電檢測',
		'維修中',
		'出貨'
	  ],
	  '充放電檢測',
	  'progress-bar-wrapper5' // created this optional parameter for container name (otherwise default container created)
	);
	ProgressBar.init(
	  [ '收到訂單',
		'排程中',
		'組裝中',
		'排程檢測',
		'充放電檢測',
		'維修中',
		'出貨'
	  ],
	  '維修中',
	  'progress-bar-wrapper6' // created this optional parameter for container name (otherwise default container created)
	);
	ProgressBar.init(
	  [ '收到訂單',
		'排程中',
		'組裝中',
		'排程檢測',
		'充放電檢測',
		'維修中',
		'出貨'
	  ],
	  '出貨',
	  'progress-bar-wrapper7' // created this optional parameter for container name (otherwise default container created)
	);
	</script>
	<script src="{{asset('Java/jquery.js')}}"></script>
	<script src="{{asset('assets_main/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets_main/js/browser.min.js')}}"></script>
	<script src="{{asset('assets_main/js/breakpoints.min.js')}}"></script>
	<script src="{{asset('assets_main/js/util.js')}}"></script>
	<script src="{{asset('assets_main/js/main.js')}}"></script>
	<script src="{{asset('JAVA/jquery.smartmenus.js')}}"></script>
	<script type="text/javascript">
		$(function() {
			$('#main-menu').smartmenus({
				subMenusSubOffsetX: 1,
				subMenusSubOffsetY: -8
				});
			});
	</script>
</html>