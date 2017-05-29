@extends('layouts.admin')

@section('content')
    <h1>گرایش‌ها</h1>
    {{--        {{dd($fieldsName)}}--}}
    <div class="row">
    <div class="col-sm-6">


        {!! Form::open(['method'=>'POST', 'action'=>'AdminMajorsController@store']) !!}

        <div class="form-group" dir="rtl">
            {!! Form::label('name','نام گرایش:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        {{--<div class="form-group">--}}
            {{--{!! Form::label('field_id','Name:') !!}--}}
            {{--{!! Form::text('field_id',null,['class'=>'form-control']) !!}--}}
        {{--</div>--}}
        <div class="form-group"dir="rtl">
            {!! Form::label('field_id','رشته مربوطه:') !!}
            {!! Form::select('field_id',['field_id'=>'یک رشته انتخاب کنید ...']+$fields,null,['class'=>'chosen-select chosen-rtl']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(' ثبت گرایش',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        <div class="row">
            {!! Form::open(array('route' => 'admin.majors.search', 'class'=>'form navbar-form navbar-right searchform'))!!}
            {!! Form::text('search', null,
                                   array('required',
                                   'dir'=>'rtl',
                                        'class'=>'form-control',
                                        'placeholder'=>'یک نام وارد نمایید...')) !!}
            {!! Form::submit('جستجو',
                                       array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}

        </div>
        <div class="row" dir="rtl">
            <div class="form-group">
                {{--{!! Form::label('majorsName','گرایش:') !!}--}}
                {{--{!! Form::select('',[''=>'یک نام انتخاب کنید ...']+ $majorsName ,null,['class'=>'chosen-select chosen-rtl']) !!}--}}
            </div>
        </div>
        @include('includes.form_error')
    </div>


    {{--@foreach ($fields as $university)--}}
    {{--{{ $university->name }}--}}
    {{--@endforeach--}}

    <?php $var = '1'; ?>
    <div class="col-sm-6">

        @if ($majors)

            <table dir="rtl" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <td>ردیف</td>
                    <td>نام رشته</td>
                    <td>نام گرایش</td>
                    {{--<th>حذف</th>--}}
                </tr>
                </thead>
                <tbody>
{{--                {{dd($majors)}}--}}
                @foreach($majors as $major)

                    <tr>
                        <td>{{$var++}}</td>
                        <td>{{$major->field->name}}</td>
                        {{--<td>--}}
                            {{--{{ $major->field->name }}--}}
                        {{--</td>--}}
                        <td><a href="{{route('admin.majors.edit',$major->id)}}">{{$major->name}}</a></td>

                        {{--<td>--}}

                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMajorsController@destroy',$major->id]]) !!}
                            <div class="form-group">
                                {{--{!! Form::submit('حذف',['class'=>'btn btn-danger btn-xs']) !!}--}}
                            </div>
                            {!! Form::close() !!}

                        {{--</td>--}}
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif
        <div class="text-center">

            {{$majors->links()}}
        </div>

    </div>

    {{--<script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>--}}
    {{--<script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>--}}

    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>
    <script type="text/javascript" >
        $('.chosen-select' ).chosen()
    </script>

    </div>
    {{--<div class="row">--}}



    {{--</div>--}}
@stop
