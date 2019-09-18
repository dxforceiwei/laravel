@extends('layouts.superuser.default')

@php
$div2=0;
@endphp

@section('main')
	@if($totalRows_Recordset2)
		<p align="center"><B>
		{{($startRow_Recordset1 + 1)}}/{{min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset2)}}
		</B></p>
		<p align="center">
		@if($pageNum_Recordset1 > 0)	
			<a href="{{$currentPage}}?pageNum_Recordset1=0{{$queryString_Recordset1}}"><img src="{{asset('images/left-double-chevron.png')}}"/></a>
		@endif
		@if($pageNum_Recordset1 > 0)	
			<a href="{{$currentPage}}?pageNum_Recordset1={{max(0, $pageNum_Recordset1 - 1)}}{{$queryString_Recordset1}}"><img src="{{asset('images/left-chevron.png')}}"/></a>
		@endif
		@if($pageNum_Recordset1 < $totalPages_Recordset1)	
			<a href="{{$currentPage}}?pageNum_Recordset1={{min($totalPages_Recordset1, $pageNum_Recordset1 + 1)}}{{$queryString_Recordset1}}"><img src="{{asset('images/right-chevron.png')}}"/></a>
		@endif
		@if($pageNum_Recordset1 < $totalPages_Recordset1)	
			<a href="{{$currentPage}}?pageNum_Recordset1={{$totalPages_Recordset1}}{{$queryString_Recordset1}}"><img src="{{asset('images/right-double-chevron.png')}}"/></a>
		@endif
		</p>
		@foreach($number as $number_val)
			@if(count($main) > 0 )
				@foreach($main as $main_val)
					<article class="post" id="div2[{{$div2++}}]">
						<header>
							<div class="title">
								<h2>{{$main_val->kind}}</h2>
								<p>編號&nbsp{{$main_val->number}}</p>
							</div>
							<div class="meta">
								<p class="published">{{$main_val->date}}</p>
								<p class="author">{{$main_val->company}}</p>
							</div>
						</header>							
						<p>
							保固:&nbsp{{$main_val->over}}
						</p>
						<p>
						@if(!empty($main_val->car_name) && !empty($main_val->car_id))
							車廠/車款型號:&nbsp{{$main_val->car_name}}&nbsp{{$main_val->car_id}}
						@endif
						@if(!empty($main_val->car_num))
						<br>
							車架號碼:&nbsp{{$main_val->car_num}}
						@endif
						echo "
						<br>
							電池型號:&nbsp{{$main_val->battery_name}}
						@if(!empty($main_val->battery_num))
						<br>
							電池號碼:&nbsp{{$main_val->battery_num}}
						@endif
						@if(!empty($main_val->replenisher_num))
						<br>
							充電器號碼:&nbsp{{$main_val-> replenisher_num}}
						@endif
						@if(!empty($main_val-> person))
						<br>
							購買人:&nbsp{{$main_val-> person}}
						@endif
						@if(!empty($main_val-> buy_date))
						<br>
							購買日期:&nbsp{{$main_val-> buy_date}}
						@endif
						@if(!empty($main_val-> person_tel))
						<br>
							連絡電話:&nbsp{{$main_val-> person_tel}}
						@endif
						<br>
							保固種類:&nbsp{{$main_val-> parts}}
						<br>
							故障原因:
							<br>
							{{$str = str_replace("\r\n","<br />",$main_val-> subject)}}
							{{$str}}						
						</p>
						<p>
							目前進度:&nbsp{{$main_val-> schedule}}&nbsp{{$main_val-> get_time}}
							
							@if(is_null($main_val-> schedule) || ($main_val-> schedule=="請選擇"))		
								<div class="status-bar" style="width: 83.33%;">
									<div class="current-status" style="width: 0%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section" style="width: 16.66%;">收到貨</li>
									<li class="section" style="width: 16.66%;">排程檢測</li>
									<li class="section" style="width: 16.66%;">維修中</li>
									<li class="section" style="width: 16.66%;">充放電檢測</li>
									<li class="section" style="width: 16.66%;">組裝中</li>
									<li class="section" style="width: 16.66%;">出貨</li>
								</ul>
							@elseif($main_val-> schedule=="收到貨")		
								<div class="status-bar" style="width: 83.33%;">
									<div class="current-status" style="width: 0%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited current" style="width: 16.66%;">收到貨</li>
									<li class="section" style="width: 16.66%;">排程檢測</li>
									<li class="section" style="width: 16.66%;">維修中</li>
									<li class="section" style="width: 16.66%;">充放電檢測</li>
									<li class="section" style="width: 16.66%;">組裝中</li>
									<li class="section" style="width: 16.66%;">出貨</li>
								</ul>
							@elseif($main_val-> schedule=="排程檢測")		
								<div class="status-bar" style="width: 83.33%;">
									<div class="current-status" style="width: 20%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 16.66%;">收到貨</li>
									<li class="section visited current" style="width: 16.66%;">排程檢測</li>
									<li class="section" style="width: 16.66%;">維修中</li>
									<li class="section" style="width: 16.66%;">充放電檢測</li>
									<li class="section" style="width: 16.66%;">組裝中</li>
									<li class="section" style="width: 16.66%;">出貨</li>
								</ul>
							@elseif($main_val-> schedule=="維修中")		
								<div class="status-bar" style="width: 83.33%;">
									<div class="current-status" style="width: 40%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 16.66%;">收到貨</li>
									<li class="section visited" style="width: 16.66%;">排程檢測</li>
									<li class="section visited current" style="width: 16.66%;">維修中</li>
									<li class="section" style="width: 16.66%;">充放電檢測</li>
									<li class="section" style="width: 16.66%;">組裝中</li>
									<li class="section" style="width: 16.66%;">出貨</li>
								</ul>
							@elseif($main_val-> schedule=="充放電檢測")			
								<div class="status-bar" style="width: 83.33%;">
									<div class="current-status" style="width: 60%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 16.66%;">收到貨</li>
									<li class="section visited" style="width: 16.66%;">排程檢測</li>
									<li class="section visited" style="width: 16.66%;">維修中</li>
									<li class="section visited current" style="width: 16.66%;">充放電檢測</li>
									<li class="section" style="width: 16.66%;">組裝中</li>
									<li class="section" style="width: 16.66%;">出貨</li>
								</ul>
							@elseif($main_val-> schedule=="組裝中")			
								<div class="status-bar" style="width: 83.33%;">
									<div class="current-status" style="width: 75%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 16.66%;">收到貨</li>
									<li class="section visited" style="width: 16.66%;">排程檢測</li>
									<li class="section visited" style="width: 16.66%;">維修中</li>
									<li class="section visited" style="width: 16.66%;">充放電檢測</li>
									<li class="section visited current" style="width: 16.66%;">組裝中</li>
									<li class="section" style="width: 16.66%;">出貨</li>
								</ul>
							@elseif($main_val-> schedule=="出貨")		
								<div class="status-bar" style="width: 83.33%;">
									<div class="current-status" style="width: 100%; transition: width 4800ms linear 0s;"></div>
								</div>
								<ul class="progress-bar">
									<li class="section visited" style="width: 16.66%;">收到貨</li>
									<li class="section visited" style="width: 16.66%;">排程檢測</li>
									<li class="section visited" style="width: 16.66%;">維修中</li>
									<li class="section visited" style="width: 16.66%;">充放電檢測</li>
									<li class="section visited" style="width: 16.66%;">組裝中</li>
									<li class="section visited current" style="width: 16.66%;">出貨</li>
								</ul>
							@endif
						</p>
						@if(!empty($main_val-> fix_dayline))
							@php $day = (strtotime($main_val-> fix_dayline)-strtotime(date("Y-m-d")))/(60*60*24); @endphp
							@if($day>=0)
								維修最終完成日:&nbsp<B><font color="red">剩餘{{$day}}天</font></B>
							@else
								維修最終完成日:&nbsp<B><font color="red">遲&nbsp{{abs($day)}}天</font></B>
							@endif
						@endif
						@if($main_val-> schedule =="出貨")
							<p><font color="red">
								出貨時間&nbsp&nbsp{{$main_val-> transport_date}}
							</font></p>
							<p><font color="red">
								出貨單號&nbsp&nbsp
								<a target="_blank" href="https://www.hct.com.tw/Search/SearchGoods_n.aspx" style="text-decoration: none;border-bottom: unset;">
									<font color="blue">
									{{$main_val-> transport_number}}
									</font>
								</a>
							</font></p>
							";
						@endif						
						<p>
							目前進度說明:
							<br>
							{{$str = str_replace("\r\n","<br />",$main_val-> schedule_subject)}}
							{{$str}}	
						</p>
						<footer style="display:unset" align="right">						
							<div class="row">
								<div class="col">
									<ul class="stats">
										<li><a href="{{ url('superuser/modity') }}?id={{$main_val->id}}&number={{$main_val->number}}&type=fix"><img src="{{asset('images/edit.png')}}"></a></li>
										<li><a href="{{ url('superuser/delete') }}?id={{$main_val->id}}&number={{$main_val->number}}&type=fix"><img src="{{asset('images/cancel.png')}}"></a></li>
									</ul>
								</div>
							<div>
						</footer>
					</article>	
				@endforeach			
			@endif
		@endforeach	
	@endif
@endsection