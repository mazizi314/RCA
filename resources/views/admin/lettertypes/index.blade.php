@extends('layouts.admin')


@section('content')
    <h1> انواع نامه</h1>
<div class="col-xs-1">

</div>
    <div class="col-xs-5">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminLettertypesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name','نام:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! Form::label('priority','اولویت:') !!}
            {!! Form::text('priority',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(' ثبت ',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        {{--<div class="row">--}}
            {{--{!! Form::open(array('route' => 'admin.groups.search', 'class'=>'form navbar-form navbar-right searchform'))!!}--}}
            {{--{!! Form::text('search', null,--}}
                                   {{--array('required',--}}
                                   {{--'dir'=>'rtl',--}}
                                        {{--'class'=>'form-control',--}}
                                        {{--'placeholder'=>'یک نام وارد نمایید...')) !!}--}}
            {{--{!! Form::submit('Search',--}}
                                       {{--array('class'=>'btn btn-default')) !!}--}}
            {{--{!! Form::close() !!}--}}

        {{--</div>--}}
        <div class="row" dir="rtl">
            {{--<div class="form-group">--}}
                {{--{!! Form::label('typesName','گروه:') !!}--}}
                {{--{!! Form::select('typesName',[''=>'یک نام انتخاب کنید ...']+ $typesName ,null,['class'=>'chosen-select chosen-rtl']) !!}--}}
            {{--</div>--}}
        </div>
    </div>


    <?php $var = '1'; ?>
    <div class="col-xs-5">
        @if ($types)
            <table dir="rtl" class="table table-condensed table-striped table-bordered table-hover text-center">
                <thead>
                <tr>
                    <td>ردیف</td>
                    <td>نوع نامه</td>
                    <td>اولویت نامه</td>
                    {{--<th>حذف</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($types as $type)
                    {{--@if($type->deleted_at==null)--}}
                        <tr>
                            <td>{{$var++}}</td>
                            <td><a href="{{route('admin.lettertypes.edit',$type->id)}}">{{$type->name}}</a></td>
                            <td>{{$type->priority}}</td>
                            {{--<td>--}}

                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminLettertypesController@destroy',$type->id]]) !!}
                                <div class="form-group">
                                    {{--{!! Form::submit('حذف',['class'=>'btn btn-danger btn-xs']) !!}--}}
                                </div>
                                {!! Form::close() !!}

                            {{--</td>--}}
                        </tr>
                    {{--@endif--}}
                @endforeach

                </tbody>
            </table>

        @endif
        <div class="text-center">

            {{$types->links()}}
        </div>

    </div>
<div class="col-xs-1">

</div>
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>

    <script type="text/javascript" >
        $('.chosen-select' ).chosen()
    </script>
    <div class="row">



    </div>
    @include('includes.form_error')
@stop