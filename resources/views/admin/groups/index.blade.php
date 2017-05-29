@extends('layouts.admin')

@section('content')
    <h1>گروه ها</h1>
    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminGroupsController@store']) !!}

        <div class="form-group">
            {!! Form::label('name','نام گروه:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(' ثبت ',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        <div class="row">
            {!! Form::open(array('route' => 'admin.groups.search', 'class'=>'form navbar-form navbar-right searchform'))!!}
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
                {!! Form::label('groupsName','گروه:') !!}
                {!! Form::select('',[''=>'یک نام انتخاب کنید ...']+ $groupsName ,null,['class'=>'chosen-select chosen-rtl']) !!}
            </div>
        </div>
    </div>




    <?php $var = '1'; ?>
    <div class="col-sm-6">
        @if ($groups)
            <table dir="rtl" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <td>ردیف</td>
                    <td>نام گروه</td>
                    {{--<th>حذف</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($groups as $group)
                    @if($group->deleted_at==null)
                        <tr>
                            <td>{{$var++}}</td>
                            <td><a href="{{route('admin.groups.edit',$group->id)}}">{{$group->name}}</a></td>

                            {{--<td>--}}

                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminGroupsController@destroy',$group->id]]) !!}
                                <div class="form-group">
                                    {{--{!! Form::submit('حذف',['class'=>'btn btn-danger btn-xs']) !!}--}}
                                </div>
                                {!! Form::close() !!}

                            {{--</td>--}}
                        </tr>
                    @endif
                @endforeach

                </tbody>
            </table>

        @endif
        <div class="text-center">

            {{$groups->links()}}
        </div>

    </div>

    {{--<script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>--}}
    {{--<script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>--}}
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>

    <script type="text/javascript" >
        $('.chosen-select' ).chosen()
    </script>
    <div class="row">

        @include('includes.form_error')

    </div>

    @stop