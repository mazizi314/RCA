@extends('layouts.admin')

@section('content')
    <h1 style="text-align: center;margin-top: 15px">‌  ویرایش نامه شماره {{$letter->number}}</h1>


    {!! Form::model($letter,['method'=>'PATCH', 'action'=>['AdminLettersController@update',$letter->id],'files'=> true]) !!}

<div class="row">
<div class="col-xs-3">
    {!! Form::label('attachment','پیوست:') !!}
    {!! Form::text('attachment',null,['class'=>'form-control']) !!}

    {!! Form::label('description','توضیحات:') !!}
    {!! Form::text('description',null,['class'=>'form-control']) !!}


    <br>
    <br>
    <div class="form-group">
        {!! Form::submit(' ثبت ',['class'=>'btn btn-primary col-xs-8']) !!}
    </div>

</div>
    <div class="col-xs-3">
        {!! Form::label('az','از:') !!}
        {!! Form::text('az',null,['class'=>'form-control']) !!}
        {!! Form::label('body','محتوا:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','cols'=>'40', 'rows'=>'3']) !!}

    </div>
    <div class="col-xs-3">

        {{--{{dd($projects)}}--}}
        <div class="form-group">

            {!! Form::label('be','گیرنده:') !!}
            {!! Form::text('be',null,['class'=>'form-control']) !!}


            {!! Form::label('lettertype_id','نوع نامه:') !!}
            {!! Form::select('lettertype_id',['lettertype_id'=>'یک نوع انتخاب کنید ...']+$lettertypes,null,['class'=>'chosen-select chosen-rtl']) !!}

            {!! Form::label('project_id','پروژه مربوطه:') !!}
            <select name= "project_id" class="chosen-select chosen-rtl">
                <option value="{{$letter->project->id}}"> {{ $letter->project->number }} {{ $letter->project->title }}</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" name="project_id">
                        {{ $project->number }} {{ $project->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{--{!! Form::label('photo_id','تصویر:') !!}--}}
            {{--{!! Form::file('photo_id',null,['class'=>'form-control']) !!}--}}
        </div>



    </div>
    <div class="col-xs-3">
        {!! Form::label('number','شماره:') !!}
        {!! Form::text('number',null,['class'=>'form-control']) !!}


        {!! Form::label('date','تاریخ:') !!}
        {!! Form::text('date', jDate::forge('now')->format('%Y/%m/%d'),['class'=>'form-control']) !!}

        {!! Form::label('mozo','موضوع:') !!}
        {!! Form::text('mozo',null,['class'=>'form-control']) !!}

    </div>




    {!! Form::close() !!}
</div>
    <div class="form-group">
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminLettersController@destroy',$letter->id]]) !!}
        {!! Form::submit('حذف ',['class'=>'btn btn-danger col-xs-2']) !!}
        {!! Form::close() !!}
    </div>

    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

@include('includes.form_error')
<script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>
<script type="text/javascript" >
    $('.chosen-select' ).chosen({width: "95%"})
</script>


@stop