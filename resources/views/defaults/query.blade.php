@extends('layouts.default')

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
	<article class="post">
		<header>
			<div class="title">
				<h2>最新消息</h2>
			</div>
		</header>
		<table id="customers">
			<tr>
				<th>類別</th>
				<th>標題</th>
				<th>日期</th>
			</tr>
			@if($totalPages_Recordset1=="0")
				@foreach($all as $row_Recordset1)
				<tr>
					<td align="center">{{$row_Recordset1->kind}}</td>
					<td><a href="details.php?id={{$row_Recordset1->id}}">{{$row_Recordset1->title}}</a></td>
					<td align="center">{{$row_Recordset1->date}}</td>
				</tr>
				@endforeach
			@else 
				<tr>
					<td align="center" colspan="3"><B>目前沒有消息<B></td>
				</tr>
			@endif
		</table>
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
	</article>	
@endsection