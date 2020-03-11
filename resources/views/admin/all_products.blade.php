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
      <th scope="col">short desctiption</th>
      <th scope="col">image</th>
      <th scope="col">price</th>
      <th scope="col">category name</th>
      <th scope="col">manufactur name</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($products as $product)
    <tr>
      <td>{{$product->product_id}}</td>
      <td>{{$product->product_name}}</td>
      <td>{{$product->short_description}}</td>
      <td>
        <img src="{{$product->image}}" width="50px;">
      </td>
      <td>{{$product->price}}</td>
      <td>{{$product->category_name}}</td>
      <td>{{$product->manufacture_name}}</td>
      <td>
      	@if($product->publication_status==1)
      		<a href="{{url('uncative_category/'.$product->category_id)}}" class="text-susscess">inactive</a>
      	@else
      		<a href="{{url('active_category/'.$product->category_id)}}" class="text-susscess">active</a>
      	@endif
      	 |
      	<a href="{{ url('/product/'.$product->category_id.'/edit')}}" class="text-susscess">edit</a> |
      	<a href="{{url('product/'.$product->category_id.'/delete')}}" class="text-susscess">delete</a> 
      </td> 
    </tr>

    @endforeach
  </tbody>
</table>
@endsection