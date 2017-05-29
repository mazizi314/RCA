@extends('layouts.admin')

@section('content')
    <h1>معاونت‌ها</h1>
    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminUnitsController@store']) !!}

        <div class="form-group">
            {!! Form::label('name','نام معاونت:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(' ثبت معاونت',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        <div class="row">
            {!! Form::open(array('route' => 'admin.units.search', 'class'=>'form navbar-form navbar-right searchform'))!!}
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
                {{--{!! Form::label('unitsName','معاونت:') !!}--}}
                {{--{!! Form::select('',[''=>'یک نام انتخاب کنید ...']+ $unitsName ,null,['class'=>'chosen-select chosen-rtl']) !!}--}}
            </div>
        </div>
    </div>


    {{--@foreach ($fields as $university)--}}
    {{--{{ $university->name }}--}}
    {{--@endforeach--}}

    <?php $var = '1'; ?>
    <div class="col-sm-6">
        @if ($units)
            <table dir="rtl" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <td>ردیف</td>
                    <td>نام معاونت</td>
                    {{--<th>حذف</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($units as $unit)
                    @if($unit->deleted_at==null)
                    <tr>
                        <td>{{$var++}}</td>
                        <td><a href="{{route('admin.units.edit',$unit->id)}}">{{$unit->name}}</a></td>

                        {{--<td>--}}

                            {{--{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUnitsController@destroy',$unit->id]]) !!}--}}
                            {{--<div class="form-group">--}}
                                {{--{!! Form::submit('حذف',['class'=>'btn btn-danger btn-xs']) !!}--}}
                            {{--</div>--}}
                            {{--{!! Form::close() !!}--}}

                        {{--</td>--}}
                    </tr>
                    @endif
                @endforeach

                </tbody>
            </table>

        @endif
        <div class="text-center">

            {{$units->links()}}
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
