@extends('layouts.admin')

@section('content')
    <h1>معاونت‌ها</h1>
    <?php $var = '1'; ?>
    <div class="col-sm-6 text-center">
        @if ($units)
            <table dir="rtl" class="table table-condensed table-striped">
                <thead>
                <tr class="text-center">
                    <th class="text-center">ردیف</th>
                    <th class="text-center">نام رشته</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($units as $unit)
                    <tr>
                        <td>{{$var++}}</td>
                        <td><a href="{{route('admin.units.edit',$unit->id)}}">{{$unit->name}}</a></td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUnitsController@destroy',$unit->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <div class="text-center">
            {{$units->links()}}
        </div>
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>
@stop
