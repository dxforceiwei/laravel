@extends('layouts.superuser.default')

@section('style')
a {
	border-bottom: none;
}
#customers {
	font-family: \"Trebuchet MS\", Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 100%;
}

#customers td, #customers th {
	border: 1px solid #ddd;
	padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: center;
	background-color: #4CAF50;
	color: white;
}
@endsection

@section('main')
	@if($totalRows_Recordset2)
		<p align="center">
			<button onclick="location.href='../defaults/export'">匯出Excel</button>
		</p>
		<hr>
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
		<article class="post" style="padding:0;">
			<font size="1">
				<table id="customers">
					<tr>
						<th>申請日期</th>
						<th>店家名稱</th>
						<th>購買人</th>
						<th>購買日期</th>
						<th>保固到期日</th>
						<th>充電器保固</th>
						<th>通訊地址</th>
						<th>購買店家</th>
						<th>車廠</th>
						<th>車款型號</th>
						<th>市話</th>
						<th>行動電話</th>
						<th>車架號碼</th>
						<th>型號</th>
						<th>電池號碼</th>
						<th>充電器號碼</th>
					</tr>
					@foreach($all as $all_val)
					<tr>
						<td align="center">{{$all_val->date}}</td>
						<td align="center">{{$all_val->company}}</td>
						<td align="center">{{$all_val->person}}</td>
						<td align="center">{{$all_val->buy_date}}</td>
						<td align="center">{{$all_val->over_date}}</td>
						<td align="center">{{$all_val->over_date2}}</td>
						<td align="center">{{$all_val->address}}</td>
						<td align="center">{{$all_val->buy_company}}</td>
						<td align="center">{{$all_val->car_name}}</td>
						<td align="center">{{$all_val->car_id}}</td>
						<td align="center">{{$all_val->person_tel}}</td>
						<td align="center">{{$all_val->person_phone}}</td>
						<td align="center">{{$all_val->car_num}}</td>
						<td align="center">{{$all_val->battery_name}}</td>
						<td align="center">{{$all_val->battery_num}}</td>
						<td align="center">{{$all_val->replenisher_num}}</td>
					</tr>
					@endforeach	
				</table>
			</font>
		</article>			
	@endif
	@if($totalRows_Recordset2 == 0)	
		<article class="post">
			<p>
				<B>無資料</B>
			</p>
		</article>
	@endif
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
	@endif
@endsection