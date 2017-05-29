@extends('layouts.admin')


@section('content')
    <h1>رشته‌ها</h1>

    <div class="row">
        {!! Form::model($field,['method'=>'PATCH', 'action'=>['AdminFieldsController@update',$field->id]]) !!}

        <div class="form-group">
            {!! Form::label('name','نام:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('به روز رسانی',['class'=>'btn btn-primary col-sm-3']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminFieldsController@destroy',$field->id]]) !!}


        <div class="form-group">
            {!! Form::submit('حذف ',['class'=>'btn btn-danger col-sm-3']) !!}
        </div>
        {!! Form::close() !!}


    </div>

    <div class="row">

        @include('includes.form_error')

    </div>
@stop