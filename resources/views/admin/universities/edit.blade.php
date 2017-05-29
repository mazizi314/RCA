@extends('layouts.admin')


@section('content')
    <h1>دانشگاه‌ها</h1>

    <div class="row">
        {!! Form::model($university,['method'=>'PATCH', 'action'=>['AdminUniversitiesController@update',$university->id]]) !!}

        <div class="form-group">
            {!! Form::label('name','نام:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('به روز رسانی',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUniversitiesController@destroy',$university->id]]) !!}


        <div class="form-group">
            {!! Form::submit('حذف ',['class'=>'btn btn-danger col-sm-5']) !!}
        </div>
        {!! Form::close() !!}


    </div>

    <div class="row">

        @include('includes.form_error')

    </div>
@stop