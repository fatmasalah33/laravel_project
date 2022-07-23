@extends('layouts.app')
@section('content')

@foreach($errors->all() as $error)
<div class="alert alert-danger">
{{$error}}
</div>
@endforeach
<div class="container">
{!! Form::open(['route' => 'phones.store']) !!}

<div class="form-group">
    <label for="phone">phone number</label>
    {{Form::text('phone_number',null,['class' => 'form-control m-3'])}}
    {{Form::submit('add',['class' => 'btn btn-primary '])}}
</div>
</div>
{!! Form::close() !!}
@endsection