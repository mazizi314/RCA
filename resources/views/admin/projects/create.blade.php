@extends('layouts.admin')

@section('content')

    <h2>تشکیل پرونده جدید</h2>

    <div class="row" dir="rtl" >
        {!! Form::open(['method'=>'POST', 'action'=>'AdminProjectsController@store','files'=> true]) !!}
        <div class="col-xs-5" dir="rtl">
            <div class="form-group">
                {!! Form::label('category_id','نوع پروژه:') !!}
                {!! Form::select('category_id',[
                  '1'=>'طرح تحقیقاتی',
                '2'=> 'طرح نخبگان',
                '3'=>'ترجمه انگلیسی به فارسی',
                '4'=>'ترجمه فارسی به انگلیسی',
                ],null,['class'=>'chosen-select chosen-rtl']) !!}
            </div>
            <div class="form-group">
                {{--,'placeholder'=>'معاونت تخصصی مربوطه را انتخاب نمایید'--}}
                {!! Form::label('unit_id','معاونت تخصصی:') !!}
                {!! Form::select('unit_id',['unit_id'=>'معاونت ها']+ $units ,null,['class'=>'chosen-select chosen-rtl']) !!}
            </div>
            <div class="form-group">
                {{--,'placeholder'=>'گروه تخصصی مربوطه را انتخاب نمایید'--}}
                {!! Form::label('group_id','گروه مربوطه:') !!}
                {!! Form::select('group_id',['group_id'=>'گروه ها']+ $groups ,null,['class'=>'chosen-select chosen-rtl']) !!}
            </div>
            {{--<div class="form-group">--}}
                {{--{!! Form::label('is_active','Status:') !!}--}}
                {{--{!! Form::select('is_active',array(1=>'فعال',0=>'غیر فعال'),1,['class'=>'form-control']) !!}--}}
            {{--</div>--}}
            <div class="form-group">
                {!! Form::label('cadr1','استاد راهنما:') !!}
{{--                {!! Form::select('cadr1',['cadr1'=>'اساتید']+ $cadrs ,null,['class'=>'chosen-select']) !!}--}}
                <select name= "cadr1" class="chosen-select chosen-rtl" >
                    <option value=""> نام استاد راهنما را انتخاب نمایید</option>
                    @foreach ($cadrs as $cadr)
                        <option value="{{ $cadr->id }}" name="cadr1">
                            {{ $cadr->fname }} {{ $cadr->lname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('cadr2','استاد مشاور:') !!}
                {{--{!! Form::select('cadr2',['cadr2'=>'اساتید']+ $cadrs ,null,['class'=>'chosen-select']) !!}--}}
                <select name= "cadr2" class="chosen-select chosen-rtl" >
                    <option value=""> نام استاد مشاور را انتخاب نمایید</option>
                    @foreach ($cadrs as $cadr)
                        <option value="{{ $cadr->id }}" name="cadr2">
                            {{ $cadr->fname }} {{ $cadr->lname }}
                        </option>
                    @endforeach
                </select>
            </div>
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

            <div class="form-group">
                {!! Form::submit('ذخیره پرونده جدید',['class'=>'btn btn-info']) !!}
            </div>
        </div>
        <div class="col-xs-5" dir="rtl" >

            <div class="form-group">
                {!! Form::label('person_id','مجری:') !!}
                {{--{!! Form::select('person_id',['person_id'=>'نام مجری']+ $mojriname ,null,['class'=>'chosen-select']) !!}--}}
{{--                {!! Form::select('person_id',) !!}--}}
                <select name= "person_id" class="chosen-select chosen-rtl">
                    <option value=""> نام مجری را انتخاب نمایید</option>
                    @foreach ($mojriname as $person)
                        <option value="{{ $person->id }}" name="person_id">
                            {{ $person->fname }} {{ $person->lname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{--DB::table('orders')->where('id', DB::raw("(select max(`id`) from orders)"))->get();--}}
{{--                {{dd(DB::table('projects')->where('id', DB::raw("(select max(`id`) from projects)"))->get())}}--}}
{{--                {{dd(DB::table('projects')->max('id'))}}--}}
                {!! Form::label('number','شماره پرونده:') !!}
                {!! Form::text('number',DB::table('projects')->max('id')+1,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title','عنوان پروژه:') !!}
                {!! Form::textarea('title',null,['class'=>'form-control','cols'=>'40', 'rows'=>'3']) !!}
            </div>
            @inject('carbon','\Carbon\Carbon')
            {{--<h2>{{$carbon::now('Asia/Tehran')}}</h2>--}}
            {{--<h2>{{$date = jDate::forge('last sunday')->format('%B %d، %Y')}}</h2>--}}
            {{--{{ $date = jDate::forge('now')->format('%B %d، %Y')}};--}}
          {{--{{ $date = jDate::forge('now')->format('%Y/%m/%d')}}--}}
            {{--<h2> <br>{{ \Morilog\Jalali\jDateTime::convertNumbers(jDate::forge('now')->format('%Y/%m/%d'))}}</h2>--}}
            {{--$jdate={{\Morilog\Jalali\jDateTime::convertNumbers($date)}};--}}
            <div class="form-group">
                {!! Form::label('opendate','تاریخ تشکیل پرونده:') !!}
                {!! Form::text('opendate', jDate::forge('now')->format('%Y/%m/%d'),['class'=>'form-control','placeholder'=>'تاریخ کامل، مثال: 1395/12/10']) !!}
            </div>
            {{--{{dd($persons)}}--}}
            {{--{{dd($personsfname+$personslname)}}--}}
        </div>

    </div>

        {!! Form::close() !!}



    @include('includes.form_error')
    {{--<script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>--}}
    {{--<script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>--}}
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>
    <script type="text/javascript" >
        $('.chosen-select' ).chosen({width: "95%"})
    </script>
@stop
