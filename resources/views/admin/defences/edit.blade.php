@extends('layouts.admin')

@section('content')
    <h1 dir="rtl"> مراحل دفاع</h1>
    <div dir="rtl">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminDefenceprojectsController@store']) !!}
            <div class="form-group">
                {{--,'placeholder'=>'معاونت تخصصی مربوطه را انتخاب نمایید'--}}
                {!! Form::label('defencelevel_id','مقطع دفاع') !!}
                {!! Form::select('defencelevel_id',['defencelevel_id'=>'مقاطع دفاع']+ $defencelevels ,null,['class'=>'chosen-select']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('defencedate','تاریخ دفاع:') !!}
                {{--{!! Form::text('defencedate',null,['class'=>'form-control']) !!}--}}
                {!! Form::text('defencedate', jDate::forge('now')->format('%Y/%m/%d'),['class'=>'form-control','placeholder'=>'تاریخ کامل، مثال: 1395/12/10']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('letternumber','شماره نامه:') !!}
                {!! Form::text('letternumber',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('letterdate','تاریخ نامه:') !!}
                {!! Form::text('letterdate',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(' ثبت ',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
    </div>
        @include('includes.form_error')
        <script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>
        <script type="text/javascript" >
            $('.chosen-select' ).chosen({width: "95%"})
        </script>
    </div>
@stop