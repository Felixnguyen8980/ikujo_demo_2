@extends('centerviews.home')
@section('title', 'Courses')
@section('arrdress1')
	<a href="{{ route('centerpage',['option'=>'courses']) }}">/Courses @yield('arrdress2')</a>
@endsection
@section('view_content')
<style>
	#listcourses{
		::selection{
		background: transparent;
		color: black;
		}
	}
	
	#listcourses .row{
		margin-bottom: 10px;
	}
	#listcourses .col2{
		text-align: center;
		background-color: rgba(0,0,0,0.01);
		box-shadow: 1px 1px 1px rgba(0,0,0,0.1);
		cursor: default;
	}
	#listcourses .col2 a{
		color: black;
		display: block;
		width: 100%;
		height: 100%;
	}
	#listcourses .col2:hover{
		background-color: rgba(0,0,0,0.03);
	}
	#listcourses .col2:active{
		background-color: rgba(0,0,0,0.05);
	}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row" id="toolCourse" style="height: 60px;">
	<div class="col1"></div>
	<div class="col2">
		<div>
		<button class="btn" onclick="showfunction()">Add Courses</button>
		</div>
	</div>
	<div class="col4">
		<div id="functionAddCourses" style="display: none">
			<p>Name <input type="text" id="CoursesName" name="CoursesName"></p>
			<button class="btn" onclick="addCourses()">Add</button>
		</div>
	</div>
	<div class="col3">
		<div class="searchbox" id="searchCourses">
			<input type="text" name="value" class="search" placeholder="search"><button><i></i></button>
		</div>
	</div>
</div>
<div id="listcourses">	
</div>
<script>
	load();
	function showfunction(){
		document.getElementById('functionAddCourses').style.display = 
	    (document.getElementById('functionAddCourses').style.display=='none')? 'block':'none';	
	}

	function addCourses(){
		$.ajax({
				url : '{{ URL::to('handle_post/addCourses') }}',
				type: 'POST',
				data :{courses_name:$('#CoursesName').val()},
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				success: function (response){
					load();
					 //alert(response.message);
				}
			});
	}

	function load(){
		$.ajax({
			url:'{{ URL::to('centerpage/listcourses') }}',
			type: 'GET',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			success: function(response){
				$('#listcourses').empty();
				var data = response.data;
				for (var i = 0;i < data.length; i++ ){
					if (i%3 == 0){
						$('#listcourses').append("<div class='row'>");
					}
					$('#listcourses').append(
						"<div class='col1'></div>"
						+"<div class='col2'>"
						//+"<a href='courses/"+data[i].id+"'>"
						+"<a href='{{ URL::to('centerpage/courses') }}/"+data[i].id+"'>"
						+data[i].name
						+"</a>"
						+"</div>"
					);
					if (i%3 == 2){
						$('#listcourses').append("<div class='col1'></div></div>");
					}
				}
			}
		});
	}
</script>
@endsection 