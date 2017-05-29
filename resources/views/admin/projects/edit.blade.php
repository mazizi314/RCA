@extends('layouts.admin')


@section('content')

    <h1 align="right">ویرایش پروژه</h1>
    <br>

    <div class="col-xs-6" dir="rtl">

        {!! Form::model($project, ['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id],'files'=> true]) !!}
        <div class="form-group">
            {!! Form::label('unit_id','معاونت تخصصی:') !!}
            {!! Form::select('unit_id',['unit_id'=>'معاونت ها']+ $units ,null,['class'=>'chosen-select chosen-rtl']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('group_id','گروه:') !!}
            {!! Form::select('group_id',['group_id'=>'گروه ها']+ $groups ,null,['class'=>'chosen-select chosen-rtl']) !!}
        </div>
        {{--<div class="form-group">--}}
            {{--{!! Form::label('is_active','Status:') !!}--}}
            {{--{!! Form::select('is_active',array(1=>'فعال',0=>'غیر فعال'),1,['class'=>'form-control']) !!}--}}
        {{--</div>--}}

        <div class="form-group">
            {{--previous way to show Asatid--}}
            <div>
                {{--@foreach($project->cadrs as $ostad)--}}
                {{--@if($ostad->pivot->helptype_id==1)--}}
                {{--{!! Form::label('cadr1','استاد راهنما:') !!} {!! Form::label('cadr1',  $ostad->fname. $ostad->lname) !!}--}}
                {{--@else--}}
                {{--<br>--}}
                {{--{!! Form::label('cadr2','استاد مشاور:') !!} {!! Form::label('cadr2',  $ostad->fname. $ostad->lname) !!}--}}
                {{--@endif--}}
                {{--@endforeach--}}
            </div>
            <div class="form-group">
                {!! Form::label('cadr1','استاد راهنما:') !!}
                <select name= "cadr1" class="chosen-select chosen-rtl" >
                    @foreach($project->cadrs as $ostad)
                        @if($ostad->pivot->helptype_id==1)
                            <option value="{{$ostad->id}}"> {{$ostad->fname}} {{$ostad->lname}}</option>
                        @endif
                    @endforeach
                    @foreach ($cadrs as $cadr)
                        <option value="{{ $cadr->id }}" name="cadr1">
                            {{ $cadr->fname }} {{ $cadr->lname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                {!! Form::label('cadr2','استاد مشاور:') !!}
                <select name= "cadr2" class="chosen-select chosen-rtl" >
                    @foreach($project->cadrs as $ostad)
                        @if($ostad->pivot->helptype_id==2   )
                            <option value="{{$ostad->id}}"> {{$ostad->fname}} {{$ostad->lname}}</option>
                        @endif
                    @endforeach
                    @foreach ($cadrs as $cadr)
                        <option value="{{ $cadr->id }}" name="cadr2">
                            {{ $cadr->fname }} {{ $cadr->lname }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        {{--div for unused sections--}}
        <div>
            {{--<div class="form-group">--}}
            {{--{!! Form::label('cadr_id3','استاد داور1:') !!}--}}
            {{--{!! Form::select('cadr_id3',['cadr_id'=>'اساتید']+ $cadrs ,null,['class'=>'chosen-select']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('cadr_id4','استاد داور2:') !!}--}}
            {{--{!! Form::select('cadr_id4',['cadr_id'=>'اساتید']+ $cadrs ,null,['class'=>'chosen-select']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('cadr_id5','ویراستار:') !!}--}}
            {{--{!! Form::select('cadr_id5',['cadr_id'=>'اساتید']+ $cadrs ,null,['class'=>'chosen-select']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--{!! Form::label('degree_id','مدرک تحصیلی:') !!}--}}
            {{--{!! Form::select('degree_id',array(0=>'کارشناسی ارشد',1=>'دکتری'),0,['class'=>'form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('photo_id','تصویر:') !!}--}}
            {{--{!! Form::file('photo_id',null,['class'=>'form-control']) !!}--}}
            {{--</div>--}}
        </div>


    </div>
    <div class="col-xs-6" dir="rtl">
        <div class="form-group">
            {!! Form::label('number','شماره پرونده:') !!}
            {!! Form::text('number',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('title','عنوان پروژه:') !!}
            {!! Form::textarea('title',null,['class'=>'form-control','cols'=>'40', 'rows'=>'3']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('opendate','تاریخ تشکیل پرونده:') !!}
            {!! Form::text('opendate',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('person_id','مجری:') !!}
            <select name= "person_id" class="chosen-select chosen-rtl" >
                <option value="{{$project->person->id}}">{{$project->person->fname}} {{$project->person->lname}}</option>
                @foreach ($mojriname as $person)
                    <option value="{{ $person->id }}" name="person_id">
                        {{ $person->fname }} {{ $person->lname }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('ویرایش پروژه',['class'=>'btn btn-primary col-sm-2']) !!}
    </div>
    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminProjectsController@destroy',$project->id]]) !!}

    <div class="form-group">
        {!! Form::submit('حذف پروژه',['class'=>'btn btn-danger col-sm-2']) !!}
    </div>
    {!! Form::close() !!}
    {{--<script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>--}}
    {{--<script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>--}}

    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>
    <script type="text/javascript" >
        $('.chosen-select' ).chosen({width: "95%"})
    </script>
    @include('includes.form_error')


@stop