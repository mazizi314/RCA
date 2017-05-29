@extends('layouts.admin')

@section('content')

    <h1>ویرایش گیرندگان و فرستندگان نامه‌ها</h1>
    <div class="col-sm-6">



        {!! Form::model($contact,['method'=>'PATCH', 'action'=>['AdminContactsController@update',$contact->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','نام:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('priority','اولویت نمایش:') !!}
            {!! Form::text('priority',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(' ویرایش',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminContactsController@destroy',$contact->id]]) !!}


        <div class="form-group">
            {!! Form::submit('حذف ',['class'=>'btn btn-danger col-sm-3']) !!}
        </div>
        {!! Form::close() !!}


    </div>
@stop
