@extends('layouts.admin')

@section('content')
    <h1>گرایش‌ها</h1>

    <?php $var = '1'; ?>
    <div class="col-sm-6">

        @if ($majors)

            <table dir="rtl" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام رشته</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>

                @foreach($majors as $major)
                    <tr>
                        <td>{{$var++}}</td>
                        <td><a href="{{route('admin.majors.edit',$major->id)}}">{{$major->name}}</a></td>

                        <td>

                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMajorsController@destroy',$major->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('حذف',['class'=>'btn btn-danger btn-xs']) !!}
                            </div>
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif
        <div class="text-center">

            {{$majors->links()}}
        </div>

    </div>
    @stop