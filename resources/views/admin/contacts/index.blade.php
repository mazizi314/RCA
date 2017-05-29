@extends('layouts.admin')

@section('content')

    <h1>فهرست گیرندگان و فرستندگان نامه‌ها</h1>
    <div class="col-sm-6">


        {!! Form::open(['method'=>'POST', 'action'=>'AdminContactsController@store']) !!}

        <div class="form-group">
            {!! Form::label('name','نام:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('priority','اولویت نمایش:') !!}
            {!! Form::text('priority',null,['class'=>'form-control']) !!}
        </div>
{{--        {{dd(Auth::user()->id)}}--}}
        {!! Form::hidden( 'user_id',Auth::user()->id) !!}
        <div class="form-group">
            {!! Form::submit(' ثبت مخاطب',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        <div class="row">
            {!! Form::open(array('route' => 'admin.contacts.search', 'class'=>'form navbar-form navbar-right searchform'))!!}
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
                {{--{!! Form::label('fieldsName','رشته:') !!}--}}
                {{--{!! Form::select('',[''=>'یک نام انتخاب کنید ...']+ $fieldsName ,null,['class'=>'chosen-select']) !!}--}}
            </div>
        </div>
    </div>



    <?php $var = '1'; ?>
    <div class="col-sm-6">

        @if ($contacts )

            <table dir="rtl" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <td>ردیف</td>
                    <td>نام مخاطب</td>
                    <td>اولویت</td>
                    {{--<th>حذف</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($contacts as $contact)
                    @if($contact->deleted_at==null)
                    <tr>
                        <td>{{$var++}}</td>
                        <td><a href="{{route('admin.contacts.edit',$contact->id)}}">{{$contact->name}}</a></td>
                        <td> {{$contact->priority}}</td>
                        {{--<td>--}}

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminContactsController@destroy',$contact->id]]) !!}
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

            {{$contacts->links()}}
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