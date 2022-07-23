@extends('layouts.app')
@section('content')
<div class="container">
  @if(session('success'))
<div class='alert alert-success'>
    {{session('success')}}
    </div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">phone</th>
      <th scope="col">author</th>
      <th scope="col"></th>
   
    </tr>
  </thead>

 
@foreach ($usersphone as $user)
<tr>
      <th scope="row"><span> {{ $user->phone_number }}</span></th>
     
      <td><h6>{{$user->User->name}}</h6></td>
      @can('update',$user)
      <td><a class="btn btn-info " href="{{ route('phones.edit',$user->id) }}">edit</a></td>
      @endcan
      @can('delete',$user)
      <td>    {!! Form::open(['route' => ['phones.destroy',$user->id],'method'=>'delete']) !!}
    <!-- <a href="{{ route('phones.destroy',$user->id) }}">delete</a> -->
    <input type="submit" value="delete" class="btn btn-danger">
    {!! Form::close() !!}</td>
    @endcan</tr>

@endforeach

  </tbody>
</table>
@endsection
</div>