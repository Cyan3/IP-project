<?php namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;

class PunctajeController extends Controller
{

    public function punctaje()
    {
        return view('pages.punctaje');
    }

    public function modul3()
    {
        return view('pages.modul3');
    }


    public function editare()
    {
        return view('pages.editare');
    }

    /**
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UpdateUserRequest $request)
    {

        $user = User::find(Auth::user()->id);
        if ($request['fname'] != '') {
            $user->fname = $request['fname'];
        }
        if ($request['lname'] != '') {
            $user->lname = $request['lname'];
        }
        if ($request['newpassword'] != '') {
            $user->password = Hash::make($request['newpassword']);
        }

        $user->save();
        return redirect('home');

        //return redirect('editare');


    }

    public function home()
    {
        return view('pages.home');
    }

}
