<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementUserRequest;
use App\User;
use DB;

class ManagementUserController extends Controller
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
     * used to handle request to index on management user
     * @return [type] [description]
     */
    public function index()
    {
    	//$users = DB::table('users')->get();
    	$users = User::with('roles')->get();
    	return view('admin.manuser.index', compact('users'));
    }

    /**
     * used to handle request to add on management user
     * @return [type] [description]
     */
    public function add()
    {
    	return view('admin.manuser.add');
    }

    public function store(ManagementUserRequest $request)
    {
    	$input = $request->all();
        $password = bcrypt($request->input('password'));
        $input['password'] = $password;

        if ($input['role'] == 1) {
        	//jadikan user dengan role admin
        	$register = User::create($input)->assignRole(1);
        } else {
        	//jadikan user dengan role user
        	$register = User::create($input)->assignRole(2);
        }
        
        session()->flash('flash_message', 'Berhasil menambah user.');

        return redirect()->route('management-user');   
        
    }
}
