<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
	public function index(){
    	$products = DB::table('tbl_products')
    				->join('tbl_category', 'tbl_products.category_id', 'tbl_category.category_id')
    				->join('tbl_manufacture', 'tbl_products.manufacture_id',  'tbl_manufacture.manufacture_id')
    				->get();
    	return view('admin.all_products', compact('products'));
    }

	public function create(){
		return view('admin.add_product');
	}

	public function store(Request $request){

		$data = array();
		$data['product_name']			= $request->product_name;
		$data['category_id']			= $request->category_id;
		$data['manufacture_id']			= $request->manufacture_id;
		$data['short_description']		= $request->short_description;
		$data['long_description']		= $request->long_description;
		$data['price']					= $request->price;
		$data['size']					= $request->size;
		$data['color']					= $request->color;
		$data['publication_status']		= $request->publication_status;

		$image=$request->file('image');
		if($image){
			$image_name = rand();
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'images/';
			$image_url = $upload_path.$image_full_name;
			$success = $image->move($upload_path,$image_full_name);
			if($success){
				$data['image']=$image_url;

				DB::table('tbl_products')->insert($data);
				return redirect('all-products')->with('success','added product');
			}
		}
		$data['image']='';
		DB::table('tbl_products')->insert($data);
		return redirect('add-product')->with('success', 'without image');

		DB::table('tbl_category')->insert($data);

		return redirect('all-category')->with('message', 'new cat added');
	}
}
