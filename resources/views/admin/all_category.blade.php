@extends('admin_layout')
@section('admin_content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
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
      	@if($category->pbulication_status==1)
      		<a href="{{url('uncative_category/'.$category->category_id)}}" class="text-susscess">inactive</a>
      	@else
      		<a href="{{url('active_category/'.$category->category_id)}}" class="text-susscess">active</a>
      	@endif
      	 |
      	<a href="{{ url('/category/'.$category->category_id.'/edit')}}" class="text-susscess">edit</a> |
      	<a href="{{url('category/'.$category->category_id.'/delete')}}" class="text-susscess">delete</a> 
      </td>
    </tr>

    @endforeach
  </tbody>
</table>
@endsection