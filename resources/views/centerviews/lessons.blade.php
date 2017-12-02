@extends('centerviews.courses')
@section('title', 'Lessons')
@section('arrdress2')
	<a href="{{ route('showlessons',['courses_id'=>$courses_id]) }}">/{{ $courses_name }} @yield('arrdress3')</a>
@endsection
@section('view_content')
<style>
	#listlessons{
		::selection{
		background: transparent;
		color: black;
		}
	}
	
	#listlessons .row{
		margin-bottom: 10px;
	}
	#listlessons .col2{
		text-align: center;
		background-color: rgba(0,0,0,0.01);
		box-shadow: 1px 1px 1px rgba(0,0,0,0.1);
		cursor: default;
	}
	#listlessons .col2 a{
		color: black;
		display: block;
		width: 100%;
		height: 100%;
	}
	#listlessons .col2:hover{
		background-color: rgba(0,0,0,0.03);
	}
	#listlessons .col2:active{
		background-color: rgba(0,0,0,0.05);
	}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row" id="toolLessons" style="height: 60px;">
	<div class="col1"></div>
	<div class="col2">
		<div>
		<button class="btn" onclick="showfunction()">Add Lessons</button>
		</div>
	</div>
	<div class="col4">
		<div id="functionAddLessons" style="display: none">
			<p>Name <input type="text" id="LessonsName" name="LessonsName"></p>
			<button class="btn" onclick="addLessons()">Add</button>
		</div>
	</div>
	<div class="col3">
		<div class="searchbox" id="searchLessons">
			<input type="text" name="value" class="search" placeholder="search"><button><i></i></button>
		</div>
	</div>
</div>
<div id="listlessons">	
</div>
<script>
	load();
	function showfunction(){
		document.getElementById('functionAddLessons').style.display
		= (document.getElementById('functionAddLessons').style.display=='none')? 'block':'none';
	} 

	function addLessons(){
		$.ajax({
			url : '{{ URL::to('handle_post/addLessons') }}',
			type : 'post',
			data : { lessons_name: $('#LessonsName').val() ,courses_id: {{ $courses_id }} },
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			success: function (response){			
				//alert(response.message);
					load();
				}
		});
	}

	function load(){
		$.ajax({
			url : '{{ URL::to('handle_post/listLessons') }}',
			type: 'post',
			data: {courses_id: {{ $courses_id }} },
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			success: function (response){	
					$('#listlessons').empty();		
					var data = response.data;
					for(var i = 0; i <data.length; i++){
						if (i%3 == 0){
							$('#listlessons').append("<div class='row'>");
						}
						$('#listlessons').append(
							"<div class='col1'></div>"
							+"<div class='col2'>"
							//+"<a href='courses/"+data[i].id+"'>"
							+"<a href=''>"
							+data[i].name
							+"</a>"
							+"</div>"
						);
						if (i%3 == 2){
							$('#listlessons').append("<div class='col1'></div></div>");
						}
					}
			}
	
		});
	}
</script>
@endsection