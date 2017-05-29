@extends('layouts.admin')




@section('content')
    <h1>Media2</h1>
    {{--<h2>echo {{var_dump($photos)}} </h2>--}}

    @if($photos)

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>

        @foreach($photos as $photo)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img height="50px" src="{{$photo->file}}" alt=""></td>

            <td>{{$photo->created_at? $photo->created_at:'no date'}}</td>
              <td>

           {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}


                  <div class="form-group">
                      {!! Form::submit('Delete Media',['class'=>'btn btn-danger']) !!}
                  </div>
             {!! Form::close() !!}

              </td>
          </tr>
         @endforeach

        </tbody>
      </table>
    @endif
    @stop