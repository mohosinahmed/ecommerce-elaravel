@extends('admin_layout')
@section('admin_content')
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">desctiption</th>
      <th scope="col">publiction status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($categories as $category)
    <tr>
      <td>{{$category->category_id}}</td>
      <td>{{$category->category_name}}</td>
      <td>{{$category->category_description}}</td>
      <td>
      	@if($category->pbulication_status==1)
      		<div class="label label-success">active</div>
      	@else
      		<div class="label label-dander">inactive</div>
      		
      	@endif
      </td>
      <td>
      	<a href="" class="text-susscess">view</a> |
      	<a href="" class="text-susscess">edit</a> |
      	<a href="" class="text-susscess">delet</a> 
      </td>
    </tr>

    @endforeach
  </tbody>
</table>
@endsection