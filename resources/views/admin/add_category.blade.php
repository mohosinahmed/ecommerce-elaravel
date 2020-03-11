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

			@if(session()->has('message'))
			    <div class="alert alert-success">
			        {{ session()->get('message') }}
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
						<form class="form-horizontal" action="{{ url('save-category') }}" method="post">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">category name</label>
							  <div class="controls">
								<input type="text" name="category_name" class="input-xlarge " >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">cate description</label>
							  <div class="controls">
								<textarea name="category_description" class="cleditor" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">publication status</label>
							  <div class="controls">
								<input type="checkbox" value="1" name="pbulication_status"  >
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection