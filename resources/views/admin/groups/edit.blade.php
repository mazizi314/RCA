@extends('layouts.admin')


@section('content')
    <h1>ویرایش گروه</h1>

    <div class="row">
        {!! Form::model($group,['method'=>'PATCH', 'action'=>['AdminGroupsController@update',$group->id]]) !!}

        <div class="form-group">
            {!! Form::label('name','نام گروه:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('به روز رسانی',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminGroupsController@destroy',$group->id]]) !!}


        <div class="form-group">
            {!! Form::submit('حذف ',['class'=>'btn btn-danger col-sm-5']) !!}
        </div>
        {!! Form::close() !!}


    </div>

    <div class="row">

        @include('includes.form_error')

    </div>
@stop