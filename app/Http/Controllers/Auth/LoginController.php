<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
	/**
	 * used to handle verification user
	 * obly guest that can access this controller
	 */
    public function __construct()
    {	
    	$this->middleware('guest');
    }
    
    /**
	 * used to handle authentication(login)
	 * @return [type] [description]
	 */
    public function doLogin(Request $request)
    {
    	
    	$credentials = [
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ];

            
            if(Auth::attempt($credentials)){
               

                    if(Auth::user()->hasRole('admin')){

                 		return redirect()->route('admin-index');

                    }
                    else if(Auth::user()->hasRole('user')){

                        //nanti diberesin

                    }


            }
            else{
                return 'username n password doesnt exist';
            }

    }
}
