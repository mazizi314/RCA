@extends('layouts.admin')


@section('content')

    <h1>Edit Person</h1>

    <div class="col-sm-3">


        <img src="../../{{$cadr->photo ? $cadr->photo->file : '../images/padafandlogo.jpg'}}" alt="" class="img-responsive img-rounded">


    </div>

    <div class="col-sm-9">

        {!! Form::model($cadr, ['method'=>'PATCH', 'action'=>['AdminCadrsController@update', $cadr->id],'files'=> true]) !!}


        <div class="form-group">
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

        <div class="form-group">
            {!! Form::label('cellphone','شماره همراه:') !!}
            {!! Form::text('cellphone',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address','آدرس:') !!}
            {!! Form::text('address',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {{--{!! Form::label('role_id','Role:') !!}--}}
            {{--{!! Form::select('role_id',[''=>'Choose Options']+$roles,null,['class'=>'form-control']) !!}--}}
        </div>


        <div class="form-group">
            {!! Form::label('is_active','Status:') !!}
            {!! Form::select('is_active',array(1=>'فعال',0=>'غیر فعال'),0,['class'=>'form-control']) !!}
        </div>




        <div class="form-group">
            {!! Form::label('photo_id','تصویر:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('ویرایش کاربر',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}




    </div>

    @include('includes.form_error')




@stop