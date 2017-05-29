@extends('layouts.admin')


@section('content')
    <h1>گرایش</h1>

    <div class="row">
        {!! Form::model($major,['method'=>'PATCH', 'action'=>['AdminMajorsController@update',$major->id]]) !!}

        <div class="form-group">
            {!! Form::label('name','نام گرایش:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group"dir="rtl">
            {!! Form::label('field_id','رشته مربوطه:') !!}
            {!! Form::select('field_id',['field_id'=>'یک رشته انتخاب کنید ...']+$fields,null,['class'=>'chosen-select chosen-rtl']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('به روز رسانی',['class'=>'btn btn-primary col-sm-3']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMajorsController@destroy',$major->id]]) !!}


        <div class="form-group">
            {!! Form::submit('حذف ',['class'=>'btn btn-danger col-sm-3']) !!}
            {{--<a class="btn btn-danger" href="#">--}}
                {{--<i class="fa fa-trash-o fa-lg"></i> Delete</a>--}}
            {{--<a class="btn btn-default btn-sm" href="#">--}}
                {{--<i class="fa fa-cog"></i> Settings</a>--}}
            {{--<a class="btn btn-lg btn-success" href="#">--}}
                {{--<i class="fa fa-flag fa-2x pull-left"></i> Font Awesome<br>Version 4.7.0</a>--}}

        </div>
        {!! Form::close() !!}


    </div>

    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>
    <script type="text/javascript" >
        $('.chosen-select' ).chosen()
    </script>
    <div class="row">

        @include('includes.form_error')

    </div>
@stop