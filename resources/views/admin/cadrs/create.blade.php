@extends('layouts.admin')


@section('content')

    <h2>ثبت پرسنل کادر</h2>
    <div class="row" dir="rtl">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminCadrsController@store','files'=> true]) !!}

        <div class="col-xs-5" dir="rtl">
            <div class="form-group">
                {!! Form::label('fathername','نام پدر:') !!}
                {!! Form::text('fathername',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('cardnumber','شماره شناسنامه:') !!}
                {!! Form::text('cardnumber',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('birthdate','تاریخ تولد:') !!}
                {!! Form::text('birthdate',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group" >
                {!! Form::label('cellphone','شماره همراه:') !!}
                {!! Form::text('cellphone',null,['class'=>'form-control col-xs-2']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address','آدرس:') !!}
                {!! Form::text('address',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>
            {{--<div class="row" dir="rtl">--}}
            <div class="form-group">
                {!! Form::label('university_id','دانشگاه:') !!}
                {!! Form::select('university_id',['university_id'=>'یک دانشگاه انتخاب کنید ...']+$universities,null,['class'=>'chosen-select']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('field_id','رشته:') !!}
                {!! Form::select('field_id',['field_id'=>'یک رشته انتخاب کنید ...']+$fields,null,['class'=>'chosen-select']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('major_id','گرایش:') !!}
                {!! Form::select('major_id',['major_id'=>'یک رشته انتخاب کنید ...']+$majors,null,['class'=>'chosen-select']) !!}
            </div>
            {{--</div>--}}

            <div class="form-group">
                {!! Form::label('is_active','Status:') !!}
                {!! Form::select('is_active',array(1=>'فعال',0=>'غیر فعال'),1,['class'=>'form-control']) !!}
            </div>

        </div>
        <div class="col-xs-5" dir="rtl">
            <div class="form-group" >

                {!! Form::label('fname','نام:') !!}
                {!! Form::text('fname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lname','نام خانوادگی:') !!}
                {!! Form::text('lname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nationalcode','کدملی:') !!}
                {!! Form::text('nationalcode',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('rank','درجه:') !!}
                {!! Form::select('rank',[
                  '-'=>'-',
                'کارمند'=>'کارمند',
                'ستوان سوم'=>'ستوان سوم',
                'ستوان دوم'=>'ستوان دوم',
                'ستوان یکم'=>'ستوان یکم',
                'سروان'=>'سروان',
                'سرگرد'=>'سرگرد',
                'سرهنگ دوم'=>'سرهنگ دوم',
                'سرهنگ'=>'سرهنگ',
                'سرتیپ دوم'=>'سرتیپ دوم',
                'سرتیپ'=>'سرتیپ',
                'سرلشکر'=>'سرلشکر',
                ],null,['class'=>'chosen-select']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('degree_id','مدرک تحصیلی:') !!}
                {!! Form::select('degree_id',array(0=>'کارشناسی ارشد',1=>'دکتری'),0,['class'=>'form-control']) !!}
            </div>

            {{--<div class="form-group">--}}
            {{--{!! Form::label('password','Password:') !!}--}}
            {{--{!! Form::password('password',['class'=>'form-control']) !!}--}}
            {{--</div>--}}

        </div>

        {{--<div class="form-group">--}}
        {{--{!! Form::label('role_id','Role:') !!}--}}
        {{--{!! Form::select('role_id',[''=>'Choose Options']+$roles,null,['class'=>'form-control']) !!}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--{!! Form::label('university_id','University:') !!}--}}
        {{--{!! Form::select('university_id',[''=>'Choose Options']+$universities,null,['class'=>'form-control']) !!}--}}
        {{--</div>--}}


    </div>
    <div class="row">
        <h1>

        </h1>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::label('photo_id','تصویر:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>

    </div>

    <div class="form-group">
        {!! Form::submit('ساختن فرد جدید',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_error')

    <script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script type="text/javascript" >
        $('.chosen-select' ).chosen({width: "95%"})
    </script>


@stop
