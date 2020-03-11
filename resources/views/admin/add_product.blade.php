@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">add category</a>
	</li>
</ul>

@if(session()->has('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
@endif

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>add category</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{ url('save-product') }}" method="post" enctype="multipart/form-data">
				@csrf
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="date01">product name</label>
						<div class="controls">
							<input type="text" name="product_name" class="input-xlarge " >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="exampleFormControlSelect1">product category</label>
						<select class="form-control" id="exampleFormControlSelect1" name="category_id">
							<?php
								$all_published_category = DB::table('tbl_category')
								->where('pbulication_status', 1)
								->get();
							?>

							@foreach($all_published_category as $category)
							<option value="{{$category->category_id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>

					<div class="control-group">
						<label class="control-label" for="exampleFormControlSelect1">product manufacture </label>
						<select class="form-control" id="exampleFormControlSelect1" name="manufacture_id">
							<?php
								$all_published_manufacture = DB::table('tbl_manufacture')
								->where('publication_status', 1)
								->get();
							?>

							@foreach($all_published_manufacture as $manufacture)
							<option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
							@endforeach
						</select>
					</div>

					<div class="control-group">
						<label class="control-label" for="fileInput">short description</label>
						<div class="controls">
							<textarea name="short_description" class="cleditor" id="textarea2" rows="3"></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="fileInput">long description</label>
						<div class="controls">
							<textarea name="long_description" class="cleditor" id="textarea2" rows="3"></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">price</label>
						<div class="controls">
							<input type="text" name="price" class="input-xlarge " >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">image</label>
						<div class="controls">
							<input type="file" name="image" class="input-xlarge " >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">size</label>
						<div class="controls">
							<input type="text" name="size" class="input-xlarge " >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">color</label>
						<div class="controls">
							<input type="text" name="color" class="input-xlarge " >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">publication status</label>
						<div class="controls">
							<input type="checkbox" value="1" name="publication_status"  >
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-primary">add product</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection