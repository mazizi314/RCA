@extends('layouts.admin')


@section('content')
    <h2 style="text-align: center;    font-size: larger; margin-top: 10px ">لیست پروژه‌ها</h2>

    @if(\Illuminate\Support\Facades\Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}} </p>
    @endif
    {{--<a dir="rtl"  href="{{route('admin.projects.create')}}">{!! Form::submit('افزودن پروژه تحقیقاتی ',['class'=>'btn btn-primary col-sm-5'])!!} </a>--}}
    <div>
        {{--{!! Form::open(array('route' => 'admin.projects.result', 'class'=>'form navbar-form navbar-right searchform'))!!}--}}
        {{--{!! Form::submit('جستجو',array('class'=>'btn btn-default')) !!}--}}
        {{--{!! Form::text('searchbox', null,array('required',--}}
        {{--'dir'=>'rtl',--}}
        {{--'class'=>'form-control',--}}
        {{--'placeholder'=>'با کلمه کلیدی یا شماره پرونده')) !!}--}}
        {{--{!! Form::close() !!}--}}
    </div>
    <table dir="rtl" class="table table-condensed table-bordered table-striped text-center">
        <thead>
        <tr style="text-align: center;">
            <td>ویرایش پرونده</td>
            <th class="text-center">عنوان</th>
            <td>مجری</td>
            <td>استاد راهنما</td>
            <td>استاد مشاور</td>
            {{--<th>معاونت تخصصی</th>--}}
            <td class="text-center">تاریخ تشکیل</td>
            <th>نامه‌ها</th>
            <td>آخرین نامه</td>
            {{--<th>Created</th>--}}
            {{--<th>Updated</th>--}}
        </tr>
        </thead>
        <tbody>
        @if($projects)
            @foreach($projects as $project)
                <tr>
                    <td>{{--<a href="{{route('admin.projects.edit',$project->id)}}" >{{$project->number}}</a>--}}
                        <a href="{{route('admin.projects.edit',$project->id)}}" class="btn btn-info btn-sm">
                            <span class="glyphicon glyphicon-edit"></span> {{$project->number}}
                        </a></td>
                    <td><a href=""
                           data-toggle="modal"
                           data-target="#myModal"
                           data-id= "{{$project->id}}"
                           data-number ="{{$project->number}}"
                           data-name = "{{$project->person->fname}} {{$project->person->lname}}"
                           data-cellphone="{{$project->person->cellphone}}"
                           data-title ="{{$project->title}}"
                           data-opendate ="{{$project->opendate}}"
                           data-category="{{$project->category->name}}"
                           data-kasri1="{{$project->kasri1}}"
                           data-kasri2="{{$project->kasri2}}"
                           data-kasri3="{{$project->kasri3}}"
                           data-bookcount="{{$project->bookcount}}"
                           @if(($project->unit->name)!=null)
                           data-unit="{{$project->unit->name}}"
                           @endif
                           data-group="{{$project->group->name}}"
                           @foreach($project->cadrs as $cadr)
                           @if($cadr->pivot->helptype_id==1   )
                           data-cadr1="{{$cadr->fname}} {{$cadr->lname}}"
                           @endif
                           @endforeach
                           @foreach($project->cadrs as $cadr)
                           @if($cadr->pivot->helptype_id==2   )
                           data-cadr2="{{$cadr->fname}} {{$cadr->lname}}"
                           @endif
                           @endforeach
                           @foreach($project->cadrs as $cadr)
                           @if($cadr->pivot->helptype_id==3)
                           data-cadr3="{{$cadr->fname}} {{$cadr->lname}}"
                           @endif
                           @endforeach
                           @foreach($project->cadrs as $cadr)
                           @if($cadr->pivot->helptype_id==4)
                           data-cadr4="{{$cadr->fname}} {{$cadr->lname}}"
                           @endif
                           @endforeach
                           @foreach($project->cadrs as $cadr)
                           @if($cadr->pivot->helptype_id==5)
                           data-cadr5="{{$cadr->fname}} {{$cadr->lname}}"
                           @endif
                           @endforeach
                           @if(count($project->defencelevels)!=0)
                           @foreach($project->defencelevels as $defencelevel)
                           @endforeach
                           data-defencelevel="{{$defencelevel->name}}"
                           data-defencedate="{{$defencelevel->pivot->defencedate}}"
                           @else
                           data-defencelevel=" دفاعی انجام نشده است"
                                @endif
                        >{{$project->title}} </a></td>
                    {{--data-toggle="modal" data-target="#myModal"--}}
                    <td>{{$project->person->fname}} {{$project->person->lname}}</td>
                    @if(count($project->cadrs)>=2) {{--اگر استاد راهنما و مشاور ثبت شده بود--}}
                    {{--{{dd($project->cadrs)}}--}}
                    @foreach($project->cadrs as $cadr)
                        @if($cadr->pivot->helptype_id==1)
                            <td>{{$cadr->fname}} {{$cadr->lname}}</td>
                        @endif
                        @if($cadr->pivot->helptype_id==2)
                            <td>{{$cadr->fname}} {{$cadr->lname}}</td>
                        @endif
                        @if($cadr->pivot->helptype_id>=3)
                            {{--@break(null)--}}
                        @endif
                        {{--<td></td>--}}
                        {{--@elseif($cadr->pivot->helptype_id!=1||2)--}}
                        {{--<td></td>--}}


                    @endforeach
                    @elseif(count($project->cadrs)==0) {{--اگر استاد راهنما و مشاور ثبت نشده بود--}}
                    <td></td>
                    <td></td>
                    @elseif(count($project->cadrs)==1){{--اگر یکی از استاد راهنما و مشاور ثبت شده بود--}}
                    @foreach($project->cadrs as $cadr)
                        @if($cadr->pivot->helptype_id==1   )
                            <td>{{$cadr->fname}} {{$cadr->lname}}</td>
                            <td></td>
                        @elseif($cadr->pivot->helptype_id==2)
                            <td></td>
                            <td>{{$cadr->fname}} {{$cadr->lname}}</td>
                        @endif
                    @endforeach
                    @endif

                    {{--<td>{{$project->unit->name}}</td>--}}
                    {{--<td>{{$project->is_active==1?'فعال':'غیر فعال'}}</td>--}}
                    <td>{{$project->opendate}}</td>
                    {{--<td>{{$person->updated_at}}</td>--}}
                    <td><a href="{{route('admin.projects.show',$project->id)}}" >نامه‌ها</a></td>
                    <td>
                        @if(count($project->defencelevels)!=0)
                            <?php $var = 'test'; ?>
                            @foreach($project->defencelevels as $defencelevel)
                            @endforeach
                            {{$defencelevel->name}}
                        @else
                            ندارد
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{$projects->links()}}
    </div>

    <!-- Trigger the modal with a button -->
    {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>--}}


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >

            <!-- Modal content-->
            <div class="modal-content" dir="rtl">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"
                        id = "myModalLable"
                    > </h4>
                    {{--<h4 class="modal-title"> {{$person->fname}} {{$person->lname}} </h4>--}}
                </div>
                <div class="modal-body">
                    {{--<p>Some text in the modal.</p>--}}
                    {{--<div class="form-group">--}}
                    {{--{!! Form::submit('Modal Operation',['class'=>'btn btn-warning col-sm-5']) !!}--}}
                    {{--</div>--}}
                    <table dir="rtl" class="table table-condensed table-striped">
                        <thead>

                        <div class="panel panel-default">
                            {{--<div class="panel-heading"> سایر اطلاعات</div>--}}
                            <div class="panel-body">
                                <div class="col-xs-12">
                                    {!! Form::label('title','عنوان پروژه:') !!}
                                    {!! Form::textarea('title',null,['class'=>'form-control' ,'readonly','cols'=>'40', 'rows'=>'2','style'=>'text-align:center']) !!}
                                </div>
                            </div>
                        </div>
                        </thead>
                        <tbody>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('group','گروه:') !!}
                                {!! Form::text('group',null,['class'=>'form-control','readonly']) !!}
                            </div>

                            {!! Form::label('cadr4','داور دوم:') !!}
                            {!! Form::text('cadr4',null,['class'=>'form-control','readonly']) !!}






                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('unit','معاونت تخصصی:') !!}
                                {!! Form::text('unit',null,['class'=>'form-control','readonly']) !!}
                            </div>

                            <div class="form-group">

                            </div>

                            {!! Form::label('cadr3','داور اول:') !!}
                            {!! Form::text('cadr3',null,['class'=>'form-control','readonly']) !!}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}

                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {!! Form::label('bookcount','تعداد کتاب:') !!}
                            {!! Form::text('bookcount',null,['class'=>'form-control','readonly']) !!}
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('defencelevel','وضعیت دفاع:') !!}
                                {!! Form::text('defencelevel',null,['class'=>'form-control','readonly']) !!}
                            </div>

                            {!! Form::label('cadr2','استاد مشاور:') !!}
                            {!! Form::text('cadr2',null,['class'=>'form-control','readonly']) !!}

                            {!! Form::label('kasri3','کسری نخبگان:') !!}
                            {!! Form::text('kasri3',null,['class'=>'form-control','readonly']) !!}
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('category','نوع همکاری:') !!}
                                {!! Form::text('category',null,['class'=>'form-control','readonly']) !!}
                                {{--{!! Form::select('category',array( '1'=>'طرح تحقیقاتی',--}}
    {{--'2'=> 'طرح نخبگان',--}}
    {{--'3'=>'ترجمه انگلیسی به فارسی',--}}
    {{--'4'=>'ترجمه فارسی به انگلیسی',),1,['class'=>'form-control','readonly']) !!}--}}
                            </div>

                            {!! Form::label('cadr1','استاد راهنما:') !!}
                            {!! Form::text('cadr1',null,['class'=>'form-control','readonly']) !!}

                            {!! Form::label('kasri2','کسری آجا:') !!}
                            {!! Form::text('kasri2',null,['class'=>'form-control','readonly']) !!}
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('opendate','تاریخ تشکیل:') !!}
                                {!! Form::text('opendate',null,['class'=>'form-control','readonly']) !!}
                            </div>

                            {!! Form::label('cellphone','شماره همراه:') !!}
                            {!! Form::text('cellphone',null,['class'=>'form-control','readonly']) !!}

                            {!! Form::label('kasri1','کسری تحقیقات:') !!}
                            {!! Form::text('kasri1',null,['class'=>'form-control','readonly']) !!}
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('number','شماره پرونده:') !!}
                                {!! Form::text('number',null,['class'=>'form-control','readonly']) !!}
                            </div>

                            {!! Form::label('name','مجری:') !!}
                            {!! Form::text('name',null,['class'=>'form-control','readonly']) !!}

                            {!! Form::label('cadr5','ویراستار:') !!}
                            {!! Form::text('cadr5',null,['class'=>'form-control','readonly']) !!}
                        </div>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{--<button type="submit" class="btn btn-primary">   ذخیره تغییرات     </button>--}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--<script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>--}}
    {{--<script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>--}}
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>
    {{--<script type = "text/javascript" src = "{{URL::asset('js/jquery.js')}}"></script>--}}
    <script type="text/javascript" >
        $(function() {
            $('#myModal').on("show.bs.modal", function (e) {
                $("#data-id").html($(e.relatedTarget).data('id'));
                $("#myModalLable").html($(e.relatedTarget).data('name'));
                $("#modal-title").html($(e.relatedTarget).data('name'));
                $("#number").val($(e.relatedTarget).data('number'));
                $("#name").val($(e.relatedTarget).data('name'));
                $("#nationalcode").val($(e.relatedTarget).data('nationalcode'));
                $("#category").val($(e.relatedTarget).data('category'));
                $("#opendate").val($(e.relatedTarget).data('opendate'));
                $("#cellphone").val($(e.relatedTarget).data('cellphone'));
                $("#title").val($(e.relatedTarget).data('title'));
                $("#address").val($(e.relatedTarget).data('address'));
                $("#kasri1").val($(e.relatedTarget).data('kasri1'));
                $("#kasri2").val($(e.relatedTarget).data('kasri2'));
                $("#kasri3").val($(e.relatedTarget).data('kasri3'));
                $("#bookcount").val($(e.relatedTarget).data('bookcount'));
                $("#cadr1").val($(e.relatedTarget).data('cadr1'));
                $("#cadr2").val($(e.relatedTarget).data('cadr2'));
                $("#cadr3").val($(e.relatedTarget).data('cadr3'));
                $("#cadr4").val($(e.relatedTarget).data('cadr4'));
                $("#cadr5").val($(e.relatedTarget).data('cadr5'));
                $("#defencelevel").val($(e.relatedTarget).data('defencelevel'));
                $("#defencedate").val($(e.relatedTarget).data('defencedate'));
                $("#unit").val($(e.relatedTarget).data('unit'));
                $("#group").val($(e.relatedTarget).data('group'));

            });
        });
    </script>
@stop
