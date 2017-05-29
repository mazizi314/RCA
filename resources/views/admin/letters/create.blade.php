@extends('layouts.admin')


@section('content')
    <h1 style="text-align: center;margin-top: 15px">‌ ثبت نامه‌ها</h1>


{!! Form::open(['method'=>'POST', 'action'=>'AdminLettersController@store','files'=> true]) !!}
<div class="row">
    <div class="col-xs-3">

    </div>
    <div class="col-xs-3">

        {{--{{dd($projects)}}--}}
        <div class="form-group">

            {!! Form::label('be','گیرنده:') !!}
            {!! Form::text('be',null,['class'=>'form-control']) !!}

            {!! Form::label('attachment','پیوست:') !!}
            {!! Form::text('attachment',null,['class'=>'form-control']) !!}
            <div class="form-group">
                {!! Form::label('attached_file_id','فایل پیوست:') !!}
                {!! Form::file('attached_file_id',null,['class'=>'form-control']) !!}
            </div>

            {!! Form::label('description','توضیحات:') !!}
            {!! Form::text('description',null,['class'=>'form-control']) !!}

            {!! Form::label('lettertype_id','نوع نامه:') !!}
            {!! Form::select('lettertype_id',['lettertype_id'=>'یک نوع انتخاب کنید ...']+$lettertypes,null,['class'=>'chosen-select chosen-rtl']) !!}

            {!! Form::label('project_id','پروژه مربوطه:') !!}
            <select name= "project_id" class="chosen-select chosen-rtl">
                <option value=""> پرونده مربوطه را انتخاب نمایید</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" name="project_id">
                        {{ $project->number }} {{ $project->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','تصویر:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(' ثبت ',['class'=>'btn btn-primary col-xs-5']) !!}
        </div>

    </div>
    <div class="col-xs-3">
        {!! Form::label('number','شماره:') !!}
        {!! Form::text('number',null,['class'=>'form-control']) !!}

        {!! Form::label('az','از:') !!}
        {!! Form::text('az',null,['class'=>'form-control']) !!}

        {!! Form::label('date','تاریخ:') !!}
        {{--{!! Form::text('date', jDate::forge('now')->format('%Y/%m/%d'),['class'=>'form-control']) !!}--}}
        {!! Form::text('date', jDate::forge('now')->format('%Y/%m/%d'),['class'=>'datepicker5 form-control']) !!}

      <!--  <p>
            <strong>استفاده از dropdown</strong><br />
            تاریخ:
            <input type="text" id="datepicker5" />
        </p> -->

        {!! Form::label('mozo','موضوع:') !!}
        {!! Form::text('mozo',null,['class'=>'form-control']) !!}
            {!! Form::label('be','به:') !!}
            {!! Form::text('be',null,['class'=>'form-control']) !!}

        {!! Form::label('body','محتوا:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','cols'=>'40', 'rows'=>'3']) !!}


    </div>
    <div class="col-xs-3">

    </div>

</div>

{!! Form::close() !!}
@include('includes.form_error')
<script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>

    <script type="text/javascript" >
        $('.chosen-select' ).chosen({width: "95%"})

    </script>

    <link type="text/css" href="{{asset('datepicker-cc6/ui.core.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('datepicker-cc6/ui.theme.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('datepicker-cc6/ui.datepicker.css')}}" rel="stylesheet" />
    <script type="text/javascript" src="{{asset('datepicker-cc6/jquery-1.3.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datepicker-cc6/ui.core.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datepicker-cc6/ui.datepicker-cc.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datepicker-cc6/calendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datepicker-cc6/ui.datepicker-cc-ar.js')}}"></script>
    <script type="text/javascript" src="{{asset('datepicker-cc6/ui.datepicker-cc-fa.js')}}"></script>
    <script type="text/javascript" >
    // استفاده از dropdown
    $('#date').datepicker({
    changeMonth: true,
    changeYear: true
    });
    </script>

    @stop