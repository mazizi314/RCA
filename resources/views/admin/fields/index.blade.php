@extends('layouts.admin')

@section('content')
    <h1>رشته‌ها</h1>
{{--        {{dd($fieldsName)}}--}}
    <div class="col-sm-6">


        {!! Form::open(['method'=>'POST', 'action'=>'AdminFieldsController@store']) !!}

        <div class="form-group">
            {!! Form::label('name','نام:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(' ثبت رشته',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        <div class="row">
            {!! Form::open(array('route' => 'admin.fields.search', 'class'=>'form navbar-form navbar-right searchform'))!!}
            {!! Form::text('search', null,
                                   array('required',
                                   'dir'=>'rtl',
                                        'class'=>'form-control',
                                        'placeholder'=>'یک نام وارد نمایید...')) !!}
            {!! Form::submit('Search',
                                       array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}

        </div>
        <div class="row" dir="rtl">
            <div class="form-group">
                {!! Form::label('fieldsName','رشته:') !!}
                {!! Form::select('',[''=>'یک نام انتخاب کنید ...']+ $fieldsName ,null,['class'=>'chosen-select']) !!}
            </div>
        </div>
    </div>


    {{--@foreach ($fields as $university)--}}
    {{--{{ $university->name }}--}}
    {{--@endforeach--}}

    <?php $var = '1'; ?>
    <div class="col-sm-6">

        @if ($fields)

            <table dir="rtl" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <td>ردیف</td>
                    <td>نام رشته</td>
                    {{--<th>حذف</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($fields as $field)
                    <tr>
                        <td>{{$var++}}</td>
                        <td><a href="{{route('admin.fields.edit',$field->id)}}">{{$field->name}}</a></td>

                        {{--<td>--}}

                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminFieldsController@destroy',$field->id]]) !!}
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

            {{$fields->links()}}
        </div>

    </div>

    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>
    <script type="text/javascript" >
        $('.chosen-select' ).chosen()
    </script>
    <div class="row">

        @include('includes.form_error')

    </div>
@stop
