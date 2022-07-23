@extends('layouts.app')
@section('content')
<div class="container">
@foreach($errors->all() as $error)
<div class="alert alert-danger">
{{$error}}
</div>
@endforeach
{!! Form::model($usersphone,['route' => ['phones.update',$usersphone->id],'method'=>'put']) !!}
<div class="form-group">
    <label for="phone">phone number</label>
    {{Form::text('phone_number',null,['class' => 'form-control m-3'])}}
    {{Form::submit('add',['class' => 'btn btn-primary '])}}
</div>
</div>
{!! Form::close() !!}
@endsection