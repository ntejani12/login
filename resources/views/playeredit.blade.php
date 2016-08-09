@extends('layouts.app')

@section('content')
<?php $playeredit = App\Models\Player::where('id', $idplayer)->first(); ?>
<?php $player = \App\Models\Player::where('id', $idplayer)->first(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Player Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('playereditaction')}}">
                   
                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('player_name') ? ' has-error' : '' }}">
                            <label for="player_name" class="col-md-4 control-label">Player Name</label>

                            <div class="col-md-6">
                                <input id="player_name" type="text" class="form-control" name="player_name" value="{{ $playeredit->player_name }}">

                                @if ($errors->has('player_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('player_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('player_age') ? ' has-error' : '' }}">
                            <label for="player_age" class="col-md-4 control-label">Player Age</label>

                            <div class="col-md-6">
                                <input id="player_age" type="text" class="form-control" name="player_age" value="{{ $playeredit->player_age }}">

                                @if ($errors->has('player_age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('player_age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                           <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id = "idplayer" name = "idplayer" value = "{{$playeredit->id}}>
                                    <i class="fa fa-btn fa-user"></i> Edit Player
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

