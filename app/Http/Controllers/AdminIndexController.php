<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminIndexController extends Controller
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
     * used to handle request to index admin page
     * @return [view] [description]
     */
	public function index()
	{
		return view('admin.index');
	}
}
