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
