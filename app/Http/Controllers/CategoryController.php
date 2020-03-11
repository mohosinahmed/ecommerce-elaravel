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

    	return redirect('all-category')->with('message', 'new cat added');
    }

    
    public function unactive_category($category_id){
    	DB::table('tbl_category')
    	->where('category_id', $category_id)
    	->update([
    		'pbulication_status' => 0,
    	]);

    	return redirect('all-category')->with('message','category inactivate');
    }
    public function active_category($category_id){
    	DB::table('tbl_category')
    	->where('category_id', $category_id)
    	->update([
    		'pbulication_status' => 1,
    	]);

    	return redirect('all-category')->with('message', 'category activated');
    }

    public function edit_category( $id){
    	$category = DB::table('tbl_category')
    	->where('category_id', $id)
    	->first();
    	return view('admin.edit_category', compact('category'));
    }

    public function update_category(Request $request, $id){
    	$data = array();
    	$data['category_name']			= $request->category_name;
    	$data['category_description']	= $request->category_description;
    	DB::table('tbl_category')
    	->where('category_id', $id)
    	->update($data);
    	return redirect('all-category')->with('message', 'category updated success');
    }

    public function delete_category( $id){
    	DB::table('tbl_category')
    	->where('category_id', $id)
    	->delete();

    	return redirect('all-category')->with('message', 'category deleted success');
    }

}
