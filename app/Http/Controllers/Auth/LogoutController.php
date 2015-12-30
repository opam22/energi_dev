<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class LogoutController extends Controller
{
	/**
	 * used to handle verification user
	 * obly user who has been logged in that can access this controller
	 */
    public function __construct()
    {	
    	$this->middleware('auth');
    }

    /**
	 * used to handle authentication(logout)
	 * @return [type] [description]
	 */
    public function doLogout()
    {
    	Auth::logout();

    	return redirect()->route('index');
    }
}
