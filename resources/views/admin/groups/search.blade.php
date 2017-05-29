@extends('layouts.admin')

@section('content')
    <h1>گروه ها</h1>





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