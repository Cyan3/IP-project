<?php namespace App\Http\Controllers;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Contracts\Validation\Validator;
use App\User;

class PunctajeController extends Controller {

	public function punctaje()
    {
        return view('pages.punctaje');
    }
    public function modul3(){
        return view('pages.modul3');
    }


    public function editare(){
        return view('pages.editare');
    }
    public function store(){

        $input= Request::all();
        //var_dump($input);
        $rules = array(
            'fname'                         => 'required|max:255',
            'lname'                         => 'required|max:255',
            'email'                         => 'required|email|max:255|unique:usrs',
            'oldpassword'                   => 'required',
            'newpassword'                   => 'required|confirmed|different:old_password',
            'confirmpassword'               => 'required|different:old_password|same:new_password'
        );
        $user = User::find(Auth::user()->id);
        //$validator = Validator::make(Input::all(), $rules);

       // if($validator->passes()) {

            //$user = UserEventbot::findOrFail(Auth::user()->id);
            //echo $user;
            $user->password = Hash::make($input['newpassword']);
            $user->fname = $input['fname'];
            $user->save();
            //return Redirect::to('/');

        //}

    }
    public function home(){
        return view('pages.home');
    }

}
