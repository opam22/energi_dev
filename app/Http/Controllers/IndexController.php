<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
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
     * used to handle request to index page
     * @return [type] [description]
     */
    public function index()
    {
    	
    	return view('auth.index');

    }

}
