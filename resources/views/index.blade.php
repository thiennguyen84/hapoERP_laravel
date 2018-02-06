@extends('master')
@section('content')
<div class="container">
  <form class="navbar-form navbar-left" action="{{route('search')}}" method="get">
    <div class="input-group">
      <input type="text" class="form-control" name="search" placeholder="Search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit">
          <i class="ti-search"></i>
        </button>
      </div>
    </div>
  </form>
	<h2>List Employees</h2>
	<table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Email</th>
        <th>Birthday</th>
        <th>Address</th>
        <th colspan="2" class="add"><div class="btn-group btn-group"><a href="{{route('add')}}" class="btn btn-info">Add</a></div></th>
      </tr>
    </thead>
    <tbody>
      <?php $dem=0;?>
    	@foreach ($employees as $value)
      <?php $dem++; ?>
      <tr>
        <td>{{$dem}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->birth_day}}</td>
        <td>{{$value->address}}</td>
        <td><div class="edit"><a href="{{route('edit',$value->id)}}" class="btn btn-info">Edit</a></div></td>
        <td><form action="/task/{{ $value->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="delete"><button class="btn btn-info">Delete</button></div>
        </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">{{$employees->links()}}</div>
</div>
@endsection