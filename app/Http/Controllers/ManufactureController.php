<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ManufactureController extends Controller
{
    public function index(){
    	$manufactures = DB::table('tbl_manufacture')->get();
    	return view('admin.all_manufacture', compact('manufactures'));
    }

    public function create(){
    	return view('admin.add_manufacture');
    }

    public function store(Request $request){

    	$data = array();
    	$data['manufacture_id']			= $request->manufacture_id;
    	$data['manufacture_name']			= $request->manufacture_name;
    	$data['manufacture_description']	= $request->manufacture_description;
    	$data['publication_status']		= $request->publication_status;

    	DB::table('tbl_manufacture')->insert($data);

    	return redirect('all-manufacture')->with('message', 'new manufacture added');
    }

    
    public function unactive_manufacture($manufacture_id){
    	DB::table('tbl_manufacture')
    	->where('manufacture_id', $manufacture_id)
    	->update([
    		'publication_status' => 0,
    	]);

    	return redirect('all-manufacture')->with('message','manufacture inactivate');
    }
    public function active_manufacture($manufacture_id){
    	DB::table('tbl_manufacture')
    	->where('manufacture_id', $manufacture_id)
    	->update([
    		'publication_status' => 1,
    	]);

    	return redirect('all-manufacture')->with('message', 'manufacture activated');
    }

    public function edit_manufacture( $id){
    	$manufacture = DB::table('tbl_manufacture')
    	->where('manufacture_id', $id)
    	->first();
    	return view('admin.edit_manufacture', compact('manufacture'));
    }

    public function update_manufacture(Request $request, $id){
    	$data = array();
    	$data['manufacture_name']			= $request->manufacture_name;
    	$data['manufacture_description']	= $request->manufacture_description;
    	DB::table('tbl_manufacture')
    	->where('manufacture_id', $id)
    	->update($data);
    	return redirect('all-manufacture')->with('message', 'manufacture updated success');
    }

    public function delete_manufacture( $id){
    	DB::table('tbl_manufacture')
    	->where('manufacture_id', $id)
    	->delete();

    	return redirect('all-manufacture')->with('message', 'manufacture deleted success');
    }
}
