@extends('layouts.admin')

@section('content')
    {{--{{dd($universities)}}--}}
<div class="col-sm-6">

    @if ($universities)


        <table dir="rtl" class="table table-condensed table-striped">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>نام دانشگاه</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>

            @foreach($universities as $university)
                <tr>
                    <td>{{$university->id}}</td>
                    <td><a href="{{route('admin.universities.edit',$university->id)}}">{{$university->name}}</a></td>

                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUniversitiesController@destroy',$university->id]]) !!}
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

        {{$universities->links()}}
    </div>

    </div>

@stop