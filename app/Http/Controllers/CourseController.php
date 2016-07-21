<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use DB;
use App\Http\Requests;

class CourseController extends Controller
{
   protected function create(array $data)
    {

    	$this->validate($request, [
			'name' => 'required|max:255',
            'email' => 'email|max:255|unique:users',
            'address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required|numeric|digits:5',
			'phone' => 'required|numeric|digits:10',
			'website' => 'max:255'
		]);

		/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Course
     */


        return Course::create([
            'name' => $data['name'],
            'email' => $data['email'],
            //'password' => bcrypt($data['password']),
	       'address'=> $data['address'],
		'city'=> $data['city'],
		'state'=> $data['state'],
		'zip'=> $data['zip'],
		'phone'=> $data['phone'],
		'website' => $data['website'],
        ]);
    }
}
