@extends('centerviews.master')
@section('title', 'Home')
@section('view')
 <link rel="stylesheet" href="{{asset('css/home.css')}}">
 <div id="wapperbox">
 	<div class="row header">
 		<div class="col2 title">
 			<h2>masters Ikujo</h2>
 		</div>
 		<div class="col5 space"></div>
 		<div class="col3 status">
 			<div class="col10 option">
     			<ul id ="row col10 masters_status">
     				
     				<li class="col2"><a href="#">#</a></li>
     				<li class="col2"><a href="#">Mail</a></li>
     				<li class="col2"><a href="#">masters</a></li>
     				<li class="col2"><a href="#">Setting</a></li>
     				<li class="col2"><a href="{{ route('centerpage',['option'=>'logout']) }}">Logout</a></li>
     			</ul>
 			</div>
 		</div>
 	</div>
 	<div class="row box_content" id="masters_option">
 		<div class="col2-5" id="side_bar_masters">
 			<ul class="option">
 				<li class="action" id="masters_search_box"><input type="text" placeholder="search" class="search"></li>        		
 				<li class="action selector" ><a href="{{ route('centerpage',['option'=>'courses']) }}">Courses</a></li>
 			</ul>
 		</div>
 		<div class="col6 main_content">
 			<div id="address_bar">
 				<p><a class="parent" href="{{ route('centerpage',['option'=>'home']) }}">Home @yield('arrdress1')</a></p>
 			</div>
 			<div id="view_content">
             @yield('view_content')
 			</div>
 		</div>
       <div id="infor_panel" class="col3-5">
             <h3>About: @yield('info_title')</h3>
             <div class="box">
                 @yield('info_content')
             </div>
    	</div>
 	</div>
</div>
@endsection