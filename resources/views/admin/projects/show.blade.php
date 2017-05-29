@extends('layouts.admin')
@section('content')
    <div class="row"style="margin-top: 15px;">
        <div class="col-xs-6">


            <table dir="rtl" class="table table-condensed table-striped text-center">
                <thead>
                <tr>
                    <th class="text-center">شماره نامه</th>
                    <th class="text-center">تاریخ</th>
                    <th class="text-center">شماره پروژه</th>
                    <th class="text-center">موضوع</th>
                    <th class="text-center">محتوا</th>
                    <th class="text-center">از</th>
                    <th class="text-center">نوع نامه</th>
                    <th class="text-center">تاریخ ثبت نامه</th>
                    <th class="text-center">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @if(count($project->letters)!=0)
                    @foreach( $project->letters as $letter)
                        <tr>
                            <td>{{$letter->number}} </td>
                            <td>{{$letter->date}}</td>
                            <td>{{$letter->project->number}}</td>
                            <td>{{$letter->mozo}}</td>
                            <td>{{$letter->body}}</td>
{{--                            {{dd($letter->az->name)}}--}}
                            <td>{{$letter->az->name}}</td>
                            <td>{{$letter->lettertype->name}}</td>
                            <td>{{   jDate::forge($letter->created_at)->format('%Y/%m/%d')}}</td>
                            <td> <a href="{{route('admin.letters.edit',$letter->id)}}" class="btn btn-info btn-sm">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
        <div class="col-xs-6">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminLettersController@store','files'=> true]) !!}

            {!! Form::label('title','عنوان پروژه:') !!}
            {!! Form::textarea('title',$project->title,['class'=>'form-control', 'cols'=>'4', 'rows'=>'2','readonly']) !!}
            {!! Form::hidden('project_id', $project->id, ['project_id' => $project->id]) !!}
{{--            {{dd($project->id)}}--}}
            <div class="col-xs-6">

                {!! Form::label('mozo','موضوع:') !!}
                {!! Form::text('mozo',$project->person->fname.' '.$project->person->lname.' '.' کدملی '.$project->person->nationalcode,['class'=>'form-control']) !!}
                {!! Form::label('body','محتوا:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','cols'=>'40', 'rows'=>'3']) !!}


                {!! Form::label('attachment','پیوست:') !!}
                {!! Form::text('attachment',null,['class'=>'form-control']) !!}

                {!! Form::label('description','توضیحات:') !!}
                {!! Form::text('description',null,['class'=>'form-control']) !!}

                {!! Form::label('lettertype_id','نوع نامه:') !!}
                {!! Form::select('lettertype_id',['lettertype_id'=>'یک نوع انتخاب کنید ...']+$lettertypes,null,['class'=>'chosen-select chosen-rtl']) !!}

                <div class="form-group">
                    <br>
                    {!! Form::submit(' ثبت ',['class'=>'btn btn-primary col-sm-10']) !!}
                </div>

            </div>
            <div class="col-xs-6">
                <br>
                {!! Form::label('projectnumber','شماره پرونده:') !!}
                {!! Form::label('projectnumber',$project->number) !!}
                <br>
                <br>
                {!! Form::label('person','مجری:') !!}
                {!! Form::label('person',$project->person->fname .' '. $project->person->lname) !!}
                <br>
                <br>
                @foreach($project->cadrs as $cadr)
                    @if($cadr->pivot->helptype_id==1   )
                        {!! Form::label('kadr1','استاد راهنما:') !!}
                        {!! Form::label('kadr1',$cadr->fname.' '.$cadr->lname)!!}
                    @endif
                    <br>
                    @if($cadr->pivot->helptype_id==2   )
                        {!! Form::label('kadr2','استاد مشاور:') !!}
                        {!! Form::label('kadr2',$cadr->fname.' '.$cadr->lname)!!}
                    @endif
                @endforeach
                <br>
                {!! Form::label('number','شماره نامه:') !!}
                {!! Form::text('number',null,['class'=>'form-control']) !!}

                {!! Form::label('date','تاریخ نامه:') !!}
                {!! Form::text('date',null,['class'=>'form-control','placeholder'=>'تاریخ کامل، مثال: 1396/06/10']) !!}

                {!! Form::label('az','از:') !!}
                {{--{!! Form::text('az',null,['class'=>'form-control']) !!}--}}
                {!! Form::select('az',['contact_id'=>'فرستنده نامه را انتخاب نمایید ...']+$contacts,null,['class'=>'chosen-select chosen-rtl']) !!}

                {!! Form::label('be','به:') !!}
                {!! Form::select('be',['contact_id'=>'گیرنده نامه را انتخاب نمایید ...']+$contacts,null,['class'=>'chosen-select chosen-rtl']) !!}
                {{--{!! Form::text('be',null,['class'=>'form-control']) !!}--}}

                {{--{!! Form::label('date','تاریخ:') !!}--}}
                {{--{!! Form::text('date', jDate::forge('now')->format('%Y/%m/%d'),['class'=>'form-control']) !!}--}}




                <div class="form-group">
                    {{--{!! Form::label('photo_id','تصویر:') !!}--}}
                    {{--{!! Form::file('photo_id',null,['class'=>'form-control']) !!}--}}
                </div>


            </div>
            {!! Form::close() !!}


            <div class="form-group">

            </div>
        </div>
    </div>




    <div  class="row" dir="rtl">

        {!! Form::model($project, ['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id]]) !!}
        <div class="col-sm-6 text-center">
            {{--<table dir="rtl" class="table table-condensed table-striped text-center">--}}
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<th class="text-center">مقطع دفاع</th>--}}
            {{--<th class="text-center">تاریخ</th>--}}
            {{--<th class="text-center">شماره نامه</th>--}}
            {{--<th class="text-center">تاریخ ارسال نامه</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($project->defencelevels as $defencelevel)--}}
            {{--<tr>--}}
            {{--{{dd($defencelevel)}}--}}
            {{--<td>{{$defencelevel->name}} </td>--}}
            {{--<td>{{$defencelevel->pivot->defencedate}}</td>--}}
            {{--<td>{{$defencelevel->pivot->letternumber}}</td>--}}
            {{--<td>{{$defencelevel->pivot->letterdate}}</td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
            {{--</table>--}}

        </div>
        <div class="col-sm-6">

            {{--<div class="col-xs-6">--}}


                {{--<div class="form-group" dir="rtl">--}}
                    {{--{!! Form::submit(' ثبت ',['class'=>'btn btn-primary col-sm-10']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--{!! Form::close() !!}--}}

        </div>

        <div class="row">
            {{--        {!! Form::model($project, ['method'=>'PATCH', 'action'=>['AdminProjectsController@davarha', $project->id]]) !!}--}}
            {!! Form::open(['url' => '/admin/projects/'.$project->id]) !!}
            <div class="well">مقطع دفاع 100

                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('cadr5','ویراستار:') !!}
                                        <select name= "cadr5" class="chosen-select chosen-rtl" >
                                            <option value=""> نام ویراستار را انتخاب نمایید</option>
                                            @foreach ($cadrs as $cadr)
                                                <option value="{{ $cadr->id }}" name="cadr5">
                                                    {{ $cadr->fname }} {{ $cadr->lname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('cadr4','داور دوم:') !!}
                                        <select name= "cadr4" class="chosen-select chosen-rtl" >
                                            <option value=""> نام داور دوم را انتخاب نمایید</option>
                                            @foreach ($cadrs as $cadr)
                                                <option value="{{ $cadr->id }}" name="cadr4">
                                                    {{ $cadr->fname }} {{ $cadr->lname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('cadr3','داور اول:') !!}
                                        <select name= "cadr3" class="chosen-select chosen-rtl" >
                                            <option value=""> نام داور اول را انتخاب نمایید</option>
                                            @foreach ($cadrs as $cadr)
                                                <option value="{{ $cadr->id }}" name="cadr3">
                                                    {{ $cadr->fname }} {{ $cadr->lname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" dir="rtl">
                                <div class="col-xs-2">
                                    <div class="form-group" dir="rtl">
                                        {!! Form::submit(' ثبت ',['class'=>'btn btn-primary col-xs-12','style'=>'margin-top: 15px;']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        {!! Form::label('bookcount','تعداد نسخ کتاب:') !!}
                                        {!! Form::text('bookcount',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        {!! Form::label('bookfishdate','تاریخ فیش کتاب:') !!}
                                        {!! Form::text('bookfishdate',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        {!! Form::label('kasri3','کسری نخبگان به روز:') !!}
                                        {!! Form::text('kasri3',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        {!! Form::label('kasri2','کسری آجا به روز:') !!}
                                        {!! Form::text('kasri2',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        {!! Form::label('kasri1','کسری تحقیقات به روز:') !!}
                                        {!! Form::text('kasri1',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                            </div>
                        </div>

                    </div>
                    {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-body">Panel Content</div>--}}
                    {{--</div>--}}
                </div>
            </div>

            {!! Form::close() !!}
        </div>

        @include('includes.form_error')

        <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
        <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>

        <script type="text/javascript" >
            $('.chosen-select' ).chosen({width: "95%"})
        </script>
@stop