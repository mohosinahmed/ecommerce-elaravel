<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index(){
    	$categories = DB::table('tbl_category')->get();
    	return view('admin.all_category', compact('categories'));
    }

    public function create(){
    	return view('admin.add_category');
    }

    public function store(Request $request){

    	$data = array();
    	$data['category_id']			= $request->category_id;
    	$data['category_name']			= $request->category_name;
    	$data['category_description']	= $request->category_description;
    	$data['pbulication_status']		= $request->pbulication_status;

    	DB::table('tbl_category')->insert($data);

    	return redirect('add-category')->with('message', 'new cat added');
    }

}
