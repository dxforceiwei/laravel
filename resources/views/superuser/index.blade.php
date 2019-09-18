@extends('layouts.superuser.default')

@php
$div1 = 0;
@endphp

@section('main')
	@if($number)
		@foreach($number as $number_val)
			@foreach($main as $main_val)
				@if($main)
					<article class="post" id="div[{{$div1++}}]">
						<header>
							<div class="title">
								<h2>{{$main_val-> kind}}</h2>
								<p>編號&nbsp{{$main_val-> number}}</p>
							</div>
							<div class="meta">
								<p class="published">{{$main_val-> date}}</p>
								<p class="author">{{$main_val-> company}}</p>
							</div>
						</header>
						<p>
						@foreach($main2 as $main2_val)
							{{$main2_val-> details}}&nbsp&nbsp&nbsp{{$main2_val-> amount}}個
							<br>
						@endforeach		
						</p>							
						<p>
							預定&nbsp{{$main_val-> expected_time}}出貨
						</p>
						<p>
							備註:
							<br>
							{{str_replace("\r\n","<br />",$main_val-> others)}}
						</p>
						<p>
							廠商說明:
							<br>
							{{$str = str_replace("\r\n","<br />",$main_val-> company_details)}}
						</p>
						<p>
							目前進度&nbsp&nbsp{{$main_val-> schedule}}
							@if(is_null($main_val->schedule) || ($main_val->schedule == "請選擇"))
								<div class="status-bar" style="width: 80%;">
									<div class="current-status" style="width: 0%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section" style="width: 20%;">收到訂單</li>
									<li class="section" style="width: 20%;">排程中</li>
									<li class="section" style="width: 20%;">充放電檢測</li>
									<li class="section" style="width: 20%;">組裝中</li>
									<li class="section" style="width: 20%;">出貨</li>
								</ul>
							@elseif($main_val->schedule=="收到訂單")
								<div class="status-bar" style="width: 80%;">
									<div class="current-status" style="width: 0%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited current" style="width: 20%;">收到訂單</li>
									<li class="section" style="width: 20%;">排程中</li>
									<li class="section" style="width: 20%;">充放電檢測</li>
									<li class="section" style="width: 20%;">組裝中</li>
									<li class="section" style="width: 20%;">出貨</li>
								</ul>
							@elseif($main_val->schedule=="排程中")		
								<div class="status-bar" style="width: 80%;">
									<div class="current-status" style="width: 25%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 20%;">收到訂單</li>
									<li class="section visited current" style="width: 20%;">排程中</li>
									<li class="section" style="width: 20%;">充放電檢測</li>
									<li class="section" style="width: 20%;">組裝中</li>
									<li class="section" style="width: 20%;">出貨</li>
								</ul>
							@elseif($main_val->schedule=="充放電檢測")	
								<div class="status-bar" style="width: 80%;">
									<div class="current-status" style="width: 50%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 20%;">收到訂單</li>
									<li class="section visited" style="width: 20%;">排程中</li>
									<li class="section visited current" style="width: 20%;">充放電檢測</li>
									<li class="section " style="width: 20%;">組裝中</li>
									<li class="section" style="width: 20%;">出貨</li>
								</ul>
							@elseif($main_val->schedule=="組裝中")		
								<div class="status-bar" style="width: 80%;">
									<div class="current-status" style="width: 75%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 20%;">收到訂單</li>
									<li class="section visited" style="width: 20%;">排程中</li>
									<li class="section visited" style="width: 20%;">充放電檢測</li>
									<li class="section visited current" style="width: 20%;">組裝中</li>
									<li class="section" style="width: 20%;">出貨</li>
								</ul>
							@elseif($main_val->schedule=="出貨")	
								<div class="status-bar" style="width: 80%;">
									<div class="current-status" style="width: 100%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 20%;">收到訂單</li>
									<li class="section visited" style="width: 20%;">排程中</li>
									<li class="section visited" style="width: 20%;">充放電檢測</li>
									<li class="section visited" style="width: 20%;">組裝中</li>
									<li class="section visited current" style="width: 20%;">出貨</li>
								</ul>
							@endif
						</p>
						@if($main_val->schedule=="出貨")
						{
							<p><font color="red">
								出貨時間&nbsp&nbsp{{$main_val->transport_date}}
							</font></p>
							<p><font color="red">
								出貨單號&nbsp&nbsp
								<a target="_blank" href="https://www.hct.com.tw/Search/SearchGoods_n.aspx" style="text-decoration: none;border-bottom: unset;">
									<font color="blue">
									{{$main_val->transport_number}}
									</font>
								</a>
							</font></p>
						}
						@endif
						<footer style="display:unset" align="right">						
							<div class="row">
								<div class="col">
									<ul class="stats">
										<li><a href="{{ url('superuser/modity') }}?id={{$main_val->id}}&number={{$main_val->number}}&type=buy"><img src="{{asset('images/edit.png')}}"></a></li>
										<li><a href="{{ url('superuser/delete') }}?id={{$main_val->id}}&number={{$main_val->number}}&type=buy"><img src="{{asset('images/cancel.png')}}"></a></li>
									</ul>
								</div>
							<div>
						</footer>
					</article>
				@endif
			@endforeach			
		@endforeach
	@endif
@endsection