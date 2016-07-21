@extends('layouts.app')

@section('content')
<?php $courseedit = App\Course::where('id', $idcourse)->first(); ?>
<?php $course = \App\Course::where('id', $idcourse)->first(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Course Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('courseeditaction')}}">
                   
                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $courseedit->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Street:</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control"  name="address" value="{{ $courseedit->address }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

			<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City:</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control"  name="city" value="{{ $courseedit->city }}">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

   			<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State:</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control"  name="state" value="{{ $courseedit->state }}">

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

				<div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                            <label for="zip" class="col-md-4 control-label">Zip Code:</label>

                            <div class="col-md-6">
                                <input id="zip" type="text" class="form-control"  name="zip" value="{{ $courseedit->zip }}">

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


			
					<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone:</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control"  name="phone" value="{{ $courseedit->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

					<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">Website:</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control"  name="website" value="{{ $courseedit->website }}">

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email Address:</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control"  name="email" value="{{ $courseedit->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                                <td><input type="text" size = "2" name = "{{'par' . $i}}" value="<?php echo $course->{'par' . $i}; ?>"> </td>
                                @endfor
                                <td><input type ="text" size = "2" name = "parout" value = "<?php echo $course->parout; ?>"></td>
                                @for ($i = 10; $i <= 18; $i++)
                                <td><input type="text" size = "2" name = "{{'par' . $i}}" value="<?php echo $course->{'par' . $i}; ?>"> </td>
                                @endfor
                                <td><input type ="text" size = "2" name = "parin" value = "<?php echo $course->parin; ?>"></td>
                                <td><input type ="text" size = "2" name = "partotal" value = "<?php echo $course->partotal; ?>"></td>
                                <td><input type ="text" size = "2" name = "slope" value = "<?php echo $course->slope; ?>"></td>
                            </tr>

                            <tr>
                              <td>Handicap</td>
                                @for ($i = 1; $i <= 9; $i++)
                                <td><input type="text" size = "2" name = "{{'hdcp' . $i}}" value="<?php echo $course->{'hdcp' . $i}; ?>"> </td>
                                @endfor
                                <td></td>
                                @for ($i = 10; $i <= 18; $i++)
                                <td><input type="text" size = "2" name = "{{'hdcp' . $i}}" value="<?php echo $course->{'hdcp' . $i}; ?>"> </td>
                                @endfor
                                
                            </tr>

                            <tr>
                            <td><input type="text" size = "5" name = "{{'color1'}}" value="<?php echo $course->{'color1'}; ?>"> </td>
                            @for ($m = 1; $m <= 9; $m++)
                            <td><input type="text" size = "2" name = "{{'color1d' . $m}}" value="<?php echo $course->{'color1d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color1parout" value = "<?php echo $course->color1parout; ?>"></td>
                            @for ($m = 10; $m <= 18; $m++)
                            <td><input type="text" size = "2" name = "{{'color1d' . $m}}" value="<?php echo $course->{'color1d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color1parin" value = "<?php echo $course->color1parin; ?>"></td>
                            <td><input type ="text" size = "2" name = "color1total" value = "<?php echo $course->color1total; ?>"></td>
                            <td><input type ="text" size = "2" name = "color1slope" value = "<?php echo $course->color1slope; ?>"></td>
                            </tr>
                            
                            <tr>
                            <td><input type="text" size = "5" name = "{{'color2'}}" value="<?php echo $course->{'color2'}; ?>"> </td>
                            @for ($m = 1; $m <= 9; $m++)
                            <td><input type="text" size = "2" name = "{{'color2d' . $m}}" value="<?php echo $course->{'color2d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color2parout" value = "<?php echo $course->color2parout; ?>"></td>
                            @for ($m = 10; $m <= 18; $m++)
                            <td><input type="text" size = "2" name = "{{'color2d' . $m}}" value="<?php echo $course->{'color2d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color2parin" value = "<?php echo $course->color2parin; ?>"></td>
                            <td><input type ="text" size = "2" name = "color2total" value = "<?php echo $course->color2total; ?>"></td>
                            <td><input type ="text" size = "2" name = "color2slope" value = "<?php echo $course->color2slope; ?>"></td>
                            </tr>

                            <tr>
                            <td><input type="text" size = "5" name = "{{'color3'}}" value="<?php echo $course->{'color3'}; ?>"> </td>
                            @for ($m = 1; $m <= 9; $m++)
                            <td><input type="text" size = "2" name = "{{'color3d' . $m}}" value="<?php echo $course->{'color3d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color3parout" value = "<?php echo $course->color3parout; ?>"></td>
                            @for ($m = 10; $m <= 18; $m++)
                            <td><input type="text" size = "2" name = "{{'color3d' . $m}}" value="<?php echo $course->{'color3d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color3parin" value = "<?php echo $course->color3parin; ?>"></td>
                            <td><input type ="text" size = "2" name = "color3total" value = "<?php echo $course->color3total; ?>"></td>
                            <td><input type ="text" size = "2" name = "color3slope" value = "<?php echo $course->color3slope; ?>"></td>
                            </tr>

                            <tr>
                            <td><input type="text" size = "5" name = "{{'color4'}}" value="<?php echo $course->{'color4'}; ?>"> </td>
                            @for ($m = 1; $m <= 9; $m++)
                            <td><input type="text" size = "2" name = "{{'color4d' . $m}}" value="<?php echo $course->{'color4d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color4parout" value = "<?php echo $course->color4parout; ?>"></td>
                            @for ($m = 10; $m <= 18; $m++)
                            <td><input type="text" size = "2" name = "{{'color4d' . $m}}" value="<?php echo $course->{'color4d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color4parin" value = "<?php echo $course->color4parin; ?>"></td>
                            <td><input type ="text" size = "2" name = "color4total" value = "<?php echo $course->color4total; ?>"></td>
                            <td><input type ="text" size = "2" name = "color4slope" value = "<?php echo $course->color4slope; ?>"></td>
                            </tr>

                            <tr>
                            <td><input type="text" size = "5" name = "{{'color5'}}" value="<?php echo $course->{'color5'}; ?>"> </td>
                            @for ($m = 1; $m <= 9; $m++)
                            <td><input type="text" size = "2" name = "{{'color5d' . $m}}" value="<?php echo $course->{'color5d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color5parout" value = "<?php echo $course->color5parout; ?>"></td>
                            @for ($m = 10; $m <= 18; $m++)
                            <td><input type="text" size = "2" name = "{{'color5d' . $m}}" value="<?php echo $course->{'color5d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color5parin" value = "<?php echo $course->color5parin; ?>"></td>
                            <td><input type ="text" size = "2" name = "color5total" value = "<?php echo $course->color5total; ?>"></td>
                            <td><input type ="text" size = "2" name = "color5slope" value = "<?php echo $course->color5slope; ?>"></td>
                            </tr>

                            <tr>
                            <td><input type="text" size = "5" name = "{{'color6'}}" value="<?php echo $course->{'color6'}; ?>"> </td>
                            @for ($m = 1; $m <= 9; $m++)
                            <td><input type="text" size = "2" name = "{{'color6d' . $m}}" value="<?php echo $course->{'color6d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color6parout" value = "<?php echo $course->color6parout; ?>"></td>
                            @for ($m = 10; $m <= 18; $m++)
                            <td><input type="text" size = "2" name = "{{'color6d' . $m}}" value="<?php echo $course->{'color6d' . $m}; ?>"> </td>
                            @endfor
                            <td><input type ="text" size = "2" name = "color6parin" value = "<?php echo $course->color6parin; ?>"></td>
                            <td><input type ="text" size = "2" name = "color6total" value = "<?php echo $course->color6total; ?>"></td>
                            <td><input type ="text" size = "2" name = "color6slope" value = "<?php echo $course->color6slope; ?>"></td>
                            </tr>



                        </table>
                
                            

    

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id = "idcourse" name = "idcourse" value = "{{$courseedit->id}}>
                                    <i class="fa fa-btn fa-user"></i> Edit Course
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
