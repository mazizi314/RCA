@extends('layouts.admin')

@section('content')


    @if(\Illuminate\Support\Facades\Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}} </p>

    @endif

    <h1 dir="rtl" style="text-align: center; margin-top: 10px;">کاربران سیستم</h1>

    <table dir="rtl" class="table table-condensed table-striped table-bordered table-hover text-center"  style="text-align: center; margin-top: 15px;">
        <thead>
        <tr>
            <td>id</td>
            <td>تصویر</td>
            <td>نام و نشان</td>
            <td>Email</td>
            <td>نقش سازمانی</td>
            <td>فعال</td>
            {{--<th>Created</th>--}}
            {{--<th>Updated</th>--}}
        </tr>
        </thead>
        <tbody>
        @if($users)

            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50px" width="50px" src="{{$user->photo ? asset($user->photo->file) : asset('images/padafandlogo.jpg')}}" alt="" class="img-responsive img-rounded"></td>

                    {{--<td><img height="50" src="{{$user->photo ? $user->photo->file:'no user photo' }}" alt=""></td>--}}
                    <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
{{--                    {{dd($user->roles())}}--}}
                    {{--{{dd($roles=$user->roles()->get())}}--}}
                    @foreach($user->roles as $role)
                    <td>{{$role->name}}</td>
                    @endforeach

                    <td>{{$user->is_active==1?'فعال':'غیر فعال'}}</td>
                    {{--<td>{{$user->created_at->diffForHumans()}}</td>--}}
                    {{--<td>{{$user->updated_at}}</td>--}}
                    <td><input type="checkbox" {{$user->hasRole('user')?'checked':''}} name="role_user"></td>
                    <td><input type="checkbox" {{$user->hasRole('guest')?'checked':''}} name="role_guest"></td>
                    <td><input type="checkbox" {{$user->hasRole('admin')?'checked':''}} name="role_admin"></td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>

    <div class="text-center">
        {{$users->links()}}
    </div>

@stop