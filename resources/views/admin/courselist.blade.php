@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('adminReset'))
				<div class="adminReset">
					<font color="green">{{Session::get('adminReset')}}</font>
				</div>
			@endif

			{!! Form::open(['route' => 'courselist', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
			<!-- <form action ="" class="navbar-form navbar-right" role="search"> -->
				<div class="input-group">
				{!! Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
				<!--<input type="text" name = "term" id="term" class="form-control" placeholder="Search..."> -->
				<span class="input-group-btn">
				<button class ="btn btn-default" type="submit">
					<i class="glyphicon glyphicon-search"></i>
				</button>
				</span>
				</div>

				{!! Form::close() !!}
			<!--</form> -->

            <div class="panel panel-default">
                <div class="panel-heading">Courses</div>
				<div class="panel-body">
				<a href="/admin/newcourse">Add Course</a>
				</div>
				@foreach (App\Course::all() as $course)
					<div class="panel-body">
                    {{$course->name}}
					<form action ="{{route('courseedit', ['idcourse' => $course->id])}}">
					<!--<form action = "{{'admin/editcourse/' . $course->id}}"> -->


					{{ csrf_field() }}
					<button  method = "GET" name = "idcourse{{$course->id}}" value = "{{$course->id}}">View Course</button> </form>
					
					
                </div>
				@endforeach
            </div>
        </div>
    </div>
</div>
@endsection
