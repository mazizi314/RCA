@extends('layouts.admin')


@section('content')

    <h1>ویرایش کاربر</h1>

    <div class="col-sm-3">
                <img src="{{$user->photo ? asset($user->photo->file) : asset('images/padafandlogo.jpg')}}" alt="" class="img-responsive img-rounded">
            </div>

    <div class="col-sm-9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=> true]) !!}

        <div class="form-group">
            {!! Form::label('name','نام کاربر:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('role_id','دسترسی:') !!}
            {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('is_active','وضعیت:') !!}
            {!! Form::select('is_active',array(1=>'فعال',0=>'غیر فعال'),1,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','رمز عبور:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id','تصویر:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('ویرایش کاربر',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}



                <div class="form-group">
                    {!! Form::submit('حذف کاربر',['class'=>'btn btn-danger col-sm-5']) !!}
                </div>
               {!! Form::close() !!}

    </div>

    @include('includes.form_error')




@stop