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
  	@foreach($manufactures as $manufacture)
    <tr>
      <td>{{$manufacture->manufacture_id}}</td>
      <td>{{$manufacture->manufacture_name}}</td>
      <td>{{$manufacture->manufacture_description}}</td>
      <td>
      	@if($manufacture->publication_status==1)
      		<div class="label label-success">active</div>
      	@else
      		<div class="label label-dander">inactive</div>
      		
      	@endif
      </td>
      <td>
      	@if($manufacture->publication_status==1)
      		<a href="{{url('uncative_manufacture/'.$manufacture->manufacture_id)}}" class="text-susscess">inactive</a>
      	@else
      		<a href="{{url('active_manufacture/'.$manufacture->manufacture_id)}}" class="text-susscess">active</a>
      	@endif
      	 |
      	<a href="{{ url('/manufacture/'.$manufacture->manufacture_id.'/edit')}}" class="text-susscess">edit</a> |
      	<a href="{{url('manufacture/'.$manufacture->manufacture_id.'/delete')}}" class="text-susscess">delete</a> 
      </td>
    </tr>

    @endforeach
  </tbody>
</table>
@endsection