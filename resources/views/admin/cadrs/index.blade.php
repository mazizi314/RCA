@extends('layouts.admin')


@section('content')
<div class="row">
    <h2>لیست همکاران تحقیقاتی کادر
    <a href="{{route('admin.cadrs.create')}}" class="btn btn-info btn-xs" style="    margin-top: 0px;">
        <span class="glyphicon glyphicon-plus"></span> افزودن همکار کادر
    </a>
    </h2>
</div>
    <table dir="rtl" class="table table-condensed table-striped table-bordered table-hover text-center">
        <thead>
        <tr>
            <td>شماره</td>
            {{--<th>تصویر</th>--}}
            <td>نام و نام خانوادگی</td>
            <td>شماره ملی</td>
            <td>نام پدر</td>
            <td>Email</td>
            <td>درجه</td>
            <td>رشته تحصیلی</td>
            <td>یگان تخصصی</td>
            {{--<th>فعال</th>--}}
            {{--<th>Created</th>--}}
            {{--<td>Updated</td>--}}
        </tr>
        </thead>
        <tbody>
        @if($cadrs)

            @foreach($cadrs as $cadr)

                <tr>
                    <td>{{$cadr->id}}</td>
                    {{--<td><img height="50px" width="50px" src="{{$person->photo ? $person->photo->file : '../images/padafandlogo.jpg'}}" alt="" class="img-responsive img-rounded"></td>--}}

                    {{--<td><img height="50" src="{{$user->photo ? $user->photo->file:'no user photo' }}" alt=""></td>--}}
                    <td><a href="{{route('admin.cadrs.edit',$cadr->id)}}">{{$cadr->fname}} {{$cadr->lname}}</a></td>
                    <td>{{$cadr->nationalcode}}</td>
                    <td>{{$cadr->fathername}}</td>
                    <td>{{$cadr->email}}</td>
                    <td>{{$cadr->rank}}</td>
                    @if($cadr->field_id!=0)
                    <td>{{$cadr->field->name}}</td>
                        @else
                        <td></td>
                    @endif
                    @if($cadr->unit_id!=0)
                    <td>{{$cadr->unit->name}}</td>
                    @else
                        <td></td>
                    @endif
                    {{--<td>{{$cadr->is_active==1?'فعال':'غیر فعال'}}</td>--}}
                    {{--<td>{{$cadr->created_at->diffForHumans()}}</td>--}}
{{--                    <td>{{$cadr->created_at}}</td>--}}
                    {{--<td>{{$cadr->updated_at}}</td>--}}
                </tr>


            @endforeach
        @endif
        </tbody>
    </table>
    <div class="text-center">

        {{$cadrs->links()}}
    </div>
@stop
