<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\User;
use DB;
use Illuminate\Mail\Message;
class AdminController extends Controller
{


    public static function isAdmin(){
		if (\Auth::guest() == false){
			$isAdminTrue = \Auth::user()->isadmin;
			if ($isAdminTrue === true){
				return true;
			}
		}
		return false;
    }

	public function editSubmit(Request $request){
		$this->validate($request, [
			'name' => 'max:255',
            'email' => 'email|max:255|unique:users',
			'zip' => 'numeric|digits:5',
			'birthday' => 'date_format:m/d/Y',
			'phone' => 'numeric|digits:10',
		]);

		$idedit = intval($request->input('idedit'));
		$useredit = User::where('id', $idedit)->first();
		if ($request->input('name') != ""){
			$useredit->name = $request->input('name');
		}
		if ($request->input('address') != ""){
			$useredit->address = $request->input('address');
		}
		if ($request->input('city') != ""){
			$useredit->city = $request->input('city');
		}
		if ($request->input('state') != ""){
			$useredit->state = $request->input('state');
		}
		if ($request->input('zip') != ""){
			$useredit->zip = $request->input('zip');
		}
		if ($request->input('birthday') != ""){
			$useredit->birthday = $request->input('birthday');
		}
		if ($request->input('phone') != ""){
			$useredit->phone = $request->input('phone');
		}
		$truefalse = $request->input('isadmin');
		$newisadmin = false;
		if (strcmp($truefalse, 'true') === 0){
			$newisadmin = true;
		}
		$useredit->isadmin = $newisadmin;
		$useredit->save();
	    /*DB::update('update users set name = ?, address = ?, city = ?, state = ?, zip = ?,
			month = ?, day = ?, year = ?, phone = ?, isadmin = ? where id = ?', [$newname,
			$newaddress, $newcity, $newstate, $newzip, $newmonth, $newday, $newyear, 
            $newphone, $newisadmin, $idedit]);*/
 		return redirect(route('userlist'));
	}

	public function newUser(Request $request){
		$this->validate($request, [
			'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required|numeric|digits:5',
			'birthday' => 'required|date_format:m/d/Y',
			'phone' => 'required|numeric|digits:10',
		]);
		$email = $request->input('email');
		//verify
		$userexist = User::where('email', $email)->get();
		//$userexist = DB::select('select 1 from users where email = ?', [$email]);
		if (count($userexist) >= 1){
		  return redirect(route('adminnew'))->withErrors(['email', 'Email Already Exists']);
		}
		$newUser = new User;
		$password = $request->input('password');
		$passwordconfirm = $request->input('password_confirmation');
		if (strcmp($password, $passwordconfirm) !== 0){
			return redirect(route('adminnew'))->withErrors(['password', 'Passwords Must Match']);
		}
		//hash password
		$password = \Hash::make($password);

		$newUser->password = $password;
		$newUser->email = $email;
		$newUser->name = $request->input('name');
		$newUser->address = $request->input('address');
		$newUser->city = $request->input('city');
		$newUser->state = $request->input('state');
		$newUser->zip = $request->input('zip');
		$newUser->birthday = $request->input('birthday');
		$newUser->phone = $request->input('phone');
		
		$newUser->save();
		
		//store, 
		  /*DB::insert('insert into users (email, name, password, address, city, 
			state, zip, month, day, year, phone) VALUES(?, ?, ?, ?, ?, ?, ?, ?, 
			?, ?, ?)', [$email, $name, $password, $address, $city, $state, 
			$zip, $month, $day, $year, $phone]);*/
		return redirect(route('userlist'));
	}

	public function resetPassword(Request $request){
		$request->session()->flash('adminReset', 'Reset Email Sent to User');
		\Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject('Your Password Reset Link');
        });
		return redirect(route('userlist'));
	}


	public function newCourse(Request $request){
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
		//$email = $request->input('email');
		//verify
		//$userexist = User::where('email', $email)->get();
		//$userexist = DB::select('select 1 from users where email = ?', [$email]);
		/*if (count($userexist) >= 1){
		  return redirect(route('newcourse'))->withErrors(['email', 'Email Already Exists']);
		}*/
		

		
		$newCourse = new Course;

	
		$newCourse->name = $request->input('name');
		$newCourse->address = $request->input('address');
		$newCourse->city = $request->input('city');
		$newCourse->state = $request->input('state');
		$newCourse->zip = $request->input('zip');
		$newCourse->phone = $request->input('phone');
		$newCourse->email = $request->input('email');
		$newCourse->website = $request->input('website');
		//$newCourse->par1 = $request->input('par1');

		for ($k = 1; $k <= 18; $k++) {
			$newCourse->{'par' . $k} = $request->input('par' . $k);
		}

		for ($k = 1; $k <= 18; $k++) {
			$newCourse->{'hdcp' . $k} = $request->input('hdcp' . $k);
		}
		for ($k = 1; $k <= 6; $k++) {
			$newCourse->{'color' . $k} = $request->input('color' . $k);
		}
		for ($k = 1; $k <= 18; $k++) {
			$newCourse->{'color1d' . $k} = $request->input('color1d' . $k);
		}
		for ($k = 1; $k <= 18; $k++) {
			$newCourse->{'color2d' . $k} = $request->input('color2d' . $k);
		}
		for ($k = 1; $k <= 18; $k++) {
			$newCourse->{'color3d' . $k} = $request->input('color3d' . $k);
		}
		for ($k = 1; $k <= 18; $k++) {
			$newCourse->{'color4d' . $k} = $request->input('color4d' . $k);
		}
		for ($k = 1; $k <= 18; $k++) {
			$newCourse->{'color5d' . $k} = $request->input('color5d' . $k);
		}
		for ($k = 1; $k <= 18; $k++) {
			$newCourse->{'color6d' . $k} = $request->input('color6d' . $k);
		}

		$newCourse->parout = $request->input('parout');
		$newCourse->color1parout = $request->input('color1parout');
		$newCourse->color2parout = $request->input('color2parout');
		$newCourse->color3parout = $request->input('color3parout');
		$newCourse->color4parout = $request->input('color4parout');
		$newCourse->color5parout = $request->input('color5parout');
		$newCourse->color6parout = $request->input('color6parout');

		$newCourse->parin = $request->input('parin');
		$newCourse->color1parin = $request->input('color1parin');
		$newCourse->color2parin = $request->input('color2parin');
		$newCourse->color3parin = $request->input('color3parin');
		$newCourse->color4parin = $request->input('color4parin');
		$newCourse->color5parin = $request->input('color5parin');
		$newCourse->color6parin = $request->input('color6parin');

		$newCourse->partotal = $request->input('partotal');
		$newCourse->color1total = $request->input('color1total');
		$newCourse->color2total = $request->input('color2total');
		$newCourse->color3total = $request->input('color3total');
		$newCourse->color4total = $request->input('color4total');
		$newCourse->color5total = $request->input('color5total');
		$newCourse->color6total = $request->input('color6total');

		$newCourse->slope = $request->input('slope');
		$newCourse->color1slope = $request->input('color1slope');
		$newCourse->color2slope = $request->input('color2slope');
		$newCourse->color3slope = $request->input('color3slope');
		$newCourse->color4slope = $request->input('color4slope');
		$newCourse->color5slope = $request->input('color5slope');
		$newCourse->color6slope = $request->input('color6slope');

		$newCourse->save();
		
		//store, 
		  /*DB::insert('insert into users (email, name, password, address, city, 
			state, zip, month, day, year, phone) VALUES(?, ?, ?, ?, ?, ?, ?, ?, 
			?, ?, ?)', [$email, $name, $password, $address, $city, $state, 
			$zip, $month, $day, $year, $phone]);*/
		return redirect(route('courselist'));
	}

	public function editCourse(Request $request){
		$this->validate($request, [
			'name' => 'max:255',
            'email' => 'email|max:255|unique:users',
            'address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'numeric|digits:5',
			'phone' => 'numeric|digits:10',
			'website' => 'max:255',



		]);

		$idcourse = intval($request->input('idcourse'));
		$courseedit = Course::where('id', $idcourse)->first();
		if ($request->input('name') != ""){
			$courseedit->name = $request->input('name');
		}
		if ($request->input('address') != ""){
			$courseedit->address = $request->input('address');
		}
		if ($request->input('city') != ""){
			$courseedit->city = $request->input('city');
		}
		if ($request->input('state') != ""){
			$courseedit->state = $request->input('state');
		}
		if ($request->input('zip') != ""){
			$courseedit->zip = $request->input('zip');
		}
		if ($request->input('phone') != ""){
			$courseedit->phone = $request->input('phone');
		}
		if ($request->input('website') != ""){
			$courseedit->website = $request->input('website');
		}
		if ($request->input('email') != ""){
			$courseedit->email = $request->input('email');
		}
		if ($request->input('parout') != ""){
			$courseedit->parout = $request->input('parout');
		}
		if ($request->input('parin') != ""){
			$courseedit->parin = $request->input('parin');
		}
		if ($request->input('partotal') != ""){
			$courseedit->partotal = $request->input('partotal');
		}
		if ($request->input('slope') != ""){
			$courseedit->slope = $request->input('slope');
		}

		if ($request->input('color1parout') != ""){
			$courseedit->color1parout = $request->input('color1parout');
		}
		if ($request->input('color2parout') != ""){
			$courseedit->color2parout = $request->input('color2parout');
		}
		if ($request->input('color3parout') != ""){
			$courseedit->color3parout = $request->input('color3parout');
		}
		if ($request->input('color4parout') != ""){
			$courseedit->color4parout = $request->input('color4parout');
		}
		if ($request->input('color5parout') != ""){
			$courseedit->color5parout = $request->input('color5parout');
		}
		if ($request->input('color6parout') != ""){
			$courseedit->color6parout = $request->input('color6parout');
		}

		if ($request->input('color1parin') != ""){
			$courseedit->color1parin = $request->input('color1parin');
		}
		if ($request->input('color2parin') != ""){
			$courseedit->color2parin = $request->input('color2parin');
		}
		if ($request->input('color3parin') != ""){
			$courseedit->color3parin = $request->input('color3parin');
		}
		if ($request->input('color4parin') != ""){
			$courseedit->color4parin = $request->input('color4parin');
		}
		if ($request->input('color5parin') != ""){
			$courseedit->color5parin = $request->input('color5parin');
		}
		if ($request->input('color6parin') != ""){
			$courseedit->color6parin = $request->input('color6parin');
		}

		if ($request->input('color1slope') != ""){
			$courseedit->color1slope = $request->input('color1slope');
		}
		if ($request->input('color2slope') != ""){
			$courseedit->color2slope = $request->input('color2slope');
		}
		if ($request->input('color3slope') != ""){
			$courseedit->color3slope = $request->input('color3slope');
		}
		if ($request->input('color4slope') != ""){
			$courseedit->color4slope = $request->input('color4slope');
		}
		if ($request->input('color5slope') != ""){
			$courseedit->color5slope = $request->input('color5slope');
		}
		if ($request->input('color6slope') != ""){
			$courseedit->color6slope = $request->input('color6slope');
		}

		if ($request->input('color1total') != ""){
			$courseedit->color1total = $request->input('color1total');
		}
		if ($request->input('color2total') != ""){
			$courseedit->color2total = $request->input('color2total');
		}
		if ($request->input('color3total') != ""){
			$courseedit->color3total = $request->input('color3total');
		}
		if ($request->input('color4total') != ""){
			$courseedit->color4total = $request->input('color4total');
		}
		if ($request->input('color5total') != ""){
			$courseedit->color5total = $request->input('color5total');
		}
		if ($request->input('color6total') != ""){
			$courseedit->color6total = $request->input('color6total');
		}


		for ($k = 1; $k <= 18; $k++) {
			if ($request->input('par' . $k) != ""){
				$courseedit->{'par' . $k} = $request->input('par' . $k);
			}
		}
		for ($k = 1; $k <= 6; $k++) {
			if ($request->input('color' . $k) != ""){
				$courseedit->{'color' . $k} = $request->input('color' . $k);
			}
		}


		for ($k = 1; $k <= 18; $k++) {
			if ($request->input('hdcp' . $k) != ""){
				$courseedit->{'hdcp' . $k} = $request->input('hdcp' . $k);
			}
		}

		for ($k = 1; $k <= 18; $k++) {
			if ($request->input('color1d' . $k) != ""){
				$courseedit->{'color1d' . $k} = $request->input('color1d' . $k);
			}
		}
		for ($k = 1; $k <= 18; $k++) {
			if ($request->input('color2d' . $k) != ""){
				$courseedit->{'color2d' . $k} = $request->input('color2d' . $k);
			}
		}
		for ($k = 1; $k <= 18; $k++) {
			if ($request->input('color3d' . $k) != ""){
				$courseedit->{'color3d' . $k} = $request->input('color3d' . $k);
			}
		}
		for ($k = 1; $k <= 18; $k++) {
			if ($request->input('color4d' . $k) != ""){
				$courseedit->{'color4d' . $k} = $request->input('color4d' . $k);
			}
		}
		for ($k = 1; $k <= 18; $k++) {
			if ($request->input('color5d' . $k) != ""){
				$courseedit->{'color5d' . $k} = $request->input('color5d' . $k);
			}
		}
		for ($k = 1; $k <= 18; $k++) {
			if ($request->input('color6d' . $k) != ""){
				$courseedit->{'color6d' . $k} = $request->input('color6d' . $k);
			}
		}

		





		




		/*$truefalse = $request->input('isadmin');
		$newisadmin = false;
		if (strcmp($truefalse, 'true') === 0){
			$newisadmin = true;
		}
		$courseedit->isadmin = $newisadmin;*/
		$courseedit->save();
	    /*DB::update('update users set name = ?, address = ?, city = ?, state = ?, zip = ?,
			month = ?, day = ?, year = ?, phone = ?, isadmin = ? where id = ?', [$newname,
			$newaddress, $newcity, $newstate, $newzip, $newmonth, $newday, $newyear, 
            $newphone, $newisadmin, $idedit]);*/
 		return redirect(route('courselist'));
	}
		
		/*public function editCourseForm(Request $request){
			$idcourse = $request->input('editcourse');
			return redirect('/admin/courseedit/{$idcourse}');
		}*/

		public function index(Request $request) {

			if (($term = $request->get('term'))){
				$query->orWhere('name', 'like', '%' .$term . '%');
				$query->orWhere('city', 'like', '%' .$term . '%');
			}

			return view('courselist');
		}

}
