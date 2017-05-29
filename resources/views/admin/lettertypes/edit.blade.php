@extends('layouts.admin')


@section('content')
    <h1>ویرایش نوع نامه</h1>

    <div class="row">
        {!! Form::model($lettertype,['method'=>'PATCH', 'action'=>['AdminLettertypesController@update',$lettertype->id]]) !!}

        <div class="form-group">
            {!! Form::label('name','نام:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! Form::label('priority','اولویت:') !!}
            {!! Form::text('priority',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('به روز رسانی',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminLettertypesController@destroy',$lettertype->id]]) !!}


        <div class="form-group">
            {!! Form::submit('حذف ',['class'=>'btn btn-danger col-xs-5']) !!}
        </div>
        {!! Form::close() !!}


    </div>

    <div class="row">

        @include('includes.form_error')

    </div>
@stop