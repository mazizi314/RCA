@extends('layouts.admin')

@section('content')
    <h1> مراحل دفاع</h1>

    <div class="row">


        {{--{!! Form::open(array('route' => 'admin.projects.defence', 'class'=>'form navbar-form navbar-right searchform'))!!}--}}
        {!! Form::text('defence', null,
                               array('required',
                               'dir'=>'rtl',
                                    'class'=>'form-control',
                                    'placeholder'=>'یک نام وارد نمایید...')) !!}
        {!! Form::submit('Defence',
                                   array('class'=>'btn btn-default')) !!}
        {!! Form::close() !!}

    </div>

    <table dir="rtl" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>شماره پرونده</th>
            <th>عنوان</th>
            <th>مجری</th>
            <th>استاد راهنما</th>
            <th>استاد مشاور</th>
            <th>تاریخ تشکیل</th>
            <th>دفاع ها</th>
          </tr>
        </thead>
        <tbody>
        @if($projects)
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->number}}</td>
                    {{--<td><a href="{{route('admin.projects.edit',$project->id)}}" >ویرایش</a></td>--}}
                    {{--<td><a href="{{ route('admin.projects.defences', ['id' => $project->id])}}" >ویرایش</a></td>--}}
                    {{--{{ action('MyController@show', $val->id) }}--}}
                    {{--{{ route('name.route', ['id' => $val->id] }}--}}
                    {{--                    {!! Form::open(['method'=>'GET', 'action'=>'AdminDefenceprojectsController@index']) !!}--}}

                    {{--<td><a href="{{route('admin.persons.edit',$person->id)}}" >{{$person->fname}} {{$person->lname}}</a></td>--}}
                    <td><a href=""
                           data-toggle="modal"
                           data-target="#myModal"
                           data-id= "{{$project->id}}"
                           data-number ="{{$project->number}}"
                           data-name = "{{$project->person->fname}} {{$project->person->lname}}"
                           data-cadr1 = "{{$project->title}}"
                           data-cadr2 = "{{$project->title}}"
                           data-nationalcode ="{{"$project->nationalcode"}}"
                           data-title ="{{$project->title}}"
                           data-cellphone ="{{$project->cellphone}}"
                           data-telephone ="{{$project->telephone}}"
                           data-address ="{{$project->address}}"
                        >{{$project->title}} </a></td>
                    {{--data-toggle="modal" data-target="#myModal"--}}
                    <td>{{$project->person->fname}} {{$project->person->lname}}</td>
                    @foreach($project->cadrs as $cadr)
                        <td>{{$cadr->fname}} {{$cadr->lname}}</td>
                    @endforeach
                    <td>{{$project->opendate}}</td>
                    <td><a href="{{route('admin.defences.edit',$project->id)}}" >دفاع ها</a></td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="text-center">

        {{$projects->links()}}
    </div>

@stop