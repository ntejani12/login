<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Player;

class PlayerController extends Controller
{
    public function addplayer(Request $request){
    	$this->validate($request, [
			'player_name' => 'required|alpha|max:255',
        	'player_age' => 'required|numeric|max:120',
			
		]);

		$newPlayer= new Player;

		$newPlayer->player_name = $request->input('player_name');
		$newPlayer->player_age = $request->input('player_age');

		$newPlayer->save();

    	//return redirect(route('/home'));
    	return redirect('/home');
    }

    public function editPlayer(Request $request){
		$this->validate($request, [
			'player_name' => 'required|alpha|max:255',
        	'player_age' => 'required|numeric|max:120',
			
		]);

		$idplayer = intval($request->input('idplayer'));
		$playeredit = Player::where('id', $idplayer)->first();
		if ($request->input('player_name') != ""){
			$playeredit->player_name = $request->input('player_name');
		}
		if ($request->input('player_age') != ""){
			$playeredit->player_age = $request->input('player_age');
		}

		$playeredit->save();

    	return redirect('/home');
    }
}
