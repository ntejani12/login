@extends('layouts.app')

@section('content')
<?php $courseedit = App\Course::where('id', $idcourse)->first(); ?>
<?php $course = \App\Course::where('id', $idcourse)->first(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Course Information</div>

                <div class="panel-body">
                    Name: {{ $courseedit->name }}
                </div>

            <div class="panel-body">
                    Email: {{ $courseedit->email }}
                </div>

            <div class="panel-body">
                    Address: {{ $courseedit->address }}, {{$courseedit->city}}, {{ $courseedit->state }}, {{ $courseedit->zip }}
                </div>

            <div class="panel-body">
                    Website: {{ $courseedit->website }} 
                </div>

            <div class="panel-body">
                    Phone Number: {{ $courseedit->phone }}
                </div>



                <table border = "1">
                    <tr>
                        <th style="width:50px">Hole</th>
                        @for($i =1; $i <= 9; $i++)
                        <th style="width: 35px">{{$i}}</th>
                        @endfor
                        <th style="width: 35px">Out</th>
                        @for ($i = 10; $i <= 18; $i++)
                        <th style="width: 35px">{{$i}}</th>
                        @endfor
                        <th style="width: 35px">In</th>
                        <th style="width: 35px">Total</th>
                        <th style="width: 35px">Slope</th>
                    </tr>
                    <tr>
                        <td>Par</td>
                        @for ($i = 1; $i <= 9; $i++)
                        <td><?php echo $course->{'par' . $i}; ?></td>
                        @endfor
                        <td>{{ $course->parout }}</td>
                        @for ($i = 10; $i <= 18; $i++)
                        <td><?php echo $course->{'par' . $i}; ?></td>
                        @endfor
                        <td>{{ $course->parin }}</td>
                        <td>{{ $course->partotal }}</td>
                    </tr>

                      <tr>
                        <td>Handicap</td>
                        @for ($i = 1; $i <= 9; $i++)
                        <td><?php echo $course->{'hdcp' . $i}; ?></td>
                        @endfor
                        <td></td>
                        @for ($i = 10; $i <= 18; $i++)
                        <td><?php echo $course->{'hdcp' . $i}; ?></td>
                        @endfor
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>


                </table>
                <form action = "{{'/admin/courseedit/' . $course->id}}">
                {{csrf_field()}}
                <button method = "GET" name = "editcourse" value = " {{$course->id}}">Edit Course</button> </form>


            <!--<div class="panel-body">
    <a href="{{route('courseview', ['idcourse' => $idcourse])}}">Change Course Information</a>
            </div> -->
            
            </div>
        </div>
    </div>
</div>
@endsection
