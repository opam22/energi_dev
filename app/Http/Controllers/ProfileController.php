<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
	 * used to handle verification user
	 * obly user who has been logged in that can access this controller
	 */
    public function __construct()
    {	
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('profile.index');
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->update($request->all());
        return redirect()->route('profile');
    }

    public function editPassword()
    {
        return view('profile.edit_password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $credentials = [
            'username' => Auth::user()->username,
            'password' => $request->input('old_password')
        ];

        if (Auth::attempt($credentials)) {
            $input['password'] = bcrypt($request->input('old_password'));
            $user = User::findOrFail(Auth::user()->id);
            $user->update($input);
            session()->flash('flash_message', 'Successfully update password.');
            return redirect()->route('profile');
        }
        else{
            session()->flash('flash_message', 'The Old Password is Wrong.');
            return redirect()->route('profile-edit-password');
        }
    }
}
