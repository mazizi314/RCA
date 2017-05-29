@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

    <div class="row">
        {!! Form::open(array('route' => 'admin.posts.result', 'class'=>'form navbar-form navbar-right searchform'))!!}
        {!! Form::text('search', null,
                               array('required',
                               'dir'=>'rtl',
                                    'class'=>'form-control',
                                    'placeholder'=>'شماره ملی را وارد نمایید...')) !!}
        {!! Form::submit('Search',
                                   array('class'=>'btn btn-default')) !!}
        {!! Form::close() !!}

    </div>


    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50px" width="50px" src="{{$post->photo ? $post->photo->file : '../images/padafandlogo.jpg'}}" alt="" class="img-responsive img-rounded"></td>
                    <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    {{--<td>{{$post->photo_id}}</td>--}}
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body , 20) }}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop
