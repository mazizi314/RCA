@extends('layouts.admin')

@section('content')

    <h1> ویرایش اطلاعات فردی {{$person->fname}} {{$person->lname}}</h1>
    <div class="row" dir="rtl">
        <div class="col-xs-3" dir="rtl">
            {!! Form::model($person, ['method'=>'PATCH', 'action'=>['AdminPersonsController@update', $person->id],'files'=> true]) !!}

            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('service_id','وضعیت خدمت:') !!}
                {!! Form::select('service_id',array(0=>'مشمول',1=>'مشغول خدمت',2=>'دانشجو'),0,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('service_date','تاریخ اعزام به خدمت:') !!}
                {!! Form::text('service_date', null,['class'=>'form-control','placeholder'=>'تاریخ کامل، مثال: 1396/11/01']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('address','آدرس:') !!}
                {!! Form::textarea('address',null,['class'=>'form-control','cols'=>'40', 'rows'=>'2']) !!}
            </div>
            <div class="form-group" >
                {!! Form::label('postalcode','کدپستی:') !!}
                {!! Form::text('postalcode',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group" >
                {!! Form::label('telephone','شماره ثابت:') !!}
                {!! Form::text('telephone',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-3" dir="rtl">


            <div class="form-group">
                {!! Form::label('birthdate','تاریخ تولد:') !!}
                {!! Form::text('birthdate',null,['class'=>'form-control','placeholder'=>'تاریخ کامل، مثال: 1370/02/10']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('degree_id','مدرک تحصیلی:') !!}
                {!! Form::select('degree_id',array(0=>'کارشناسی ارشد',1=>'دکتری'),0,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('university_id','دانشگاه:') !!}
                {!! Form::select('university_id',['university_id'=>'یک دانشگاه را انتخاب کنید ...']+$universities,null,['class'=>'chosen-select chosen-rtl']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('field_id','رشته:') !!}
                {!! Form::select('field_id',['field_id'=>'یک رشته را انتخاب کنید ...']+$fields,null,['class'=>'chosen-select chosen-rtl']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('major_id','گرایش:') !!}
                {!! Form::select('major_id',['major_id'=>'یک گرایش را انتخاب کنید ...']+$majors,null,['class'=>'chosen-select chosen-rtl']) !!}
            </div>
            {{--<div class="form-group">--}}
                {{--{!! Form::label('is_active','Status:') !!}--}}
                {{--{!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),1,['class'=>'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--{!! Form::label('password','Password:') !!}--}}
            {{--{!! Form::password('password',['class'=>'form-control']) !!}--}}
            {{--</div>--}}



        </div>

        <div class="col-xs-3" dir="rtl">


            <div class="form-group">
                {!! Form::label('fname','نام:') !!}
                {!! Form::text('fname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lname','نام خانوادگی:') !!}
                {!! Form::text('lname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fathername','نام پدر:') !!}
                {!! Form::text('fathername',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nationalcode','کدملی:') !!}
                {!! Form::text('nationalcode',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('cardnumber','شماره شناسنامه:') !!}
                {!! Form::text('cardnumber',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cellphone','شماره همراه:') !!}
                {!! Form::text('cellphone',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('ویرایش کاربر',['class'=>'btn btn-primary col-sm-6']) !!}
            </div>


            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPersonsController@destroy',$person->id],
            'style' => 'display:inline',
        'onsubmit' => "return confirm('آیا برای حذف کاربر مورد نظر مطمئنید؟')",]) !!}
            <div class="form-group">
                {!! Form::submit('حذف کاربر',['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            {!! Form::close() !!}


        </div>

        <div class="col-xs-3" dir="rtl">
            <img src="../../../{{$person->photo ? $person->photo->file : 'images/padafandlogo.jpg'}}" alt="" class="img-responsive img-rounded">

            <div class="form-group">
                {!! Form::label('photo_id','تصویر:') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

                {!! Form::label('cv_file_id','فایل رزومه:') !!}
                {!! Form::file('cv_file_id',null,['class'=>'form-control']) !!}

                {!! Form::label('nationalcode_file_id','تصویر کارت ملی:') !!}
                {!! Form::file('nationalcode_file_id',null,['class'=>'form-control']) !!}

                {!! Form::label('card_file_id','تصویر شناسنامه:') !!}
                {!! Form::file('card_file_id',null,['class'=>'form-control']) !!}

                {!! Form::label('degree_file_id','تصویر مدرک تحصیلی:') !!}
                {!! Form::file('degree_file_id',null,['class'=>'form-control']) !!}

                {!! Form::label('address_file_id','تصویر کروکی منزل:') !!}
                {!! Form::file('address_file_id',null,['class'=>'form-control']) !!}

            </div>
        </div>
    </div>

    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    @include('includes.form_error')

    {{--old way to access external resources--}}
    {{--<script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>--}}
    {{--<script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>--}}

    {{--new way to access external resources--}}
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>
    <script type="text/javascript" >
        $('.chosen-select' ).chosen({width: "95%"})
    </script>

@stop