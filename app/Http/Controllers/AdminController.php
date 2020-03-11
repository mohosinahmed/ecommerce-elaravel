<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){

    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')
    	->where('admin_email', $admin_email)
    	->where('admin_password', $admin_password)
    	->first();

    	if($result){
    		session::put('admin_name', $result->admin_name);
    		session::put('admin_id', $result->admin_id);
    		return redirect('dashboard');
    	}else{
    		session::put('message','email or pass invalid');
    		return redirect('admin');
    	}
        //return view('admin.dashboard');
    }
}
