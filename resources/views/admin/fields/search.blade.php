@extends('layouts.admin')

@section('content')
    <h1>رشته‌ها</h1>
    {{--        {{dd($fieldsName)}}--}}
    <?php $var = '1'; ?>
    <div class="col-sm-6 text-center">
        @if ($fields)
            <table dir="rtl" class="table table-condensed table-striped">
                <thead>
                <tr class="text-center">
                    <th class="text-center">ردیف</th>
                    <th class="text-center">نام رشته</th>
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
                                {{--{!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}--}}
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
    <div class="row">
        @include('includes.form_error')
    </div>
@stop
