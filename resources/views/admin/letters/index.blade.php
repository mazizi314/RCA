@extends('layouts.admin')


@section('content')
    <h1 style="text-align: center;margin-top: 15px">‌ نامه‌های ثبت شده</h1>

    <div class="col-xs-12 text-center">

        <table class="table table-condensed table-striped text-center">
            <thead>
            <tr>
                <th class="text-center">از</th>
                <th class="text-center">به</th>
                <th class="text-center">شماره نامه</th>
                <th class="text-center">ویرایش</th>
                <th class="text-center">تاریخ</th>
                <th class="text-center">شماره پروژه</th>
                <th class="text-center">موضوع</th>
                {{--<th class="text-center">محتوا</th>--}}
                <th class="text-center">نوع نامه</th>
                <th class="text-center">تاریخ ثبت نامه</th>
            </tr>
            </thead>
            <tbody>
            {{--{!! Form::model($letter, ['method'=>'PATCH', 'action'=>['AdminLettersController@update', $letter->id]]) !!}--}}
            @if($letters)
                {{--                        {{dd($letters)}}--}}
                @foreach( $letters as $letter)
                    <tr>
                        <td>{{$letter->az->name}}</td>
                        <td>{{$letter->be->name}}</td>
                        <td><a href=""
                               data-toggle="modal"
                               data-target="#myModal"
                               data-id= "{{$letter->id}}"
                               data-name ="{{$letter->number}}"
                               data-number ="{{$letter->number}}"
                               data-mozo = "{{$letter->mozo}}"
                               data-date = "{{$letter->date}}"
                               data-az="{{$letter->az->name}}"
                               data-be="{{$letter->be->name}}"
                               data-body="{{$letter->body}}"
                               data-attachment="{{$letter->attachment}}"
                               data-lettertype="{{$letter->lettertype->name}}"
                               data-project="{{$letter->project->title}}"
                               data-projectnumber="{{$letter->project->number}}"
                               data-description ="{{$letter->description}}"
                               data-recivedate ="{{jDate::forge($letter->created_at)->format('%Y/%m/%d')}}"

                            >{{$letter->number}} </a></td>


                        <td> <a href="{{route('admin.letters.edit',$letter->id)}}" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a></td>
                        <td>{{$letter->date}}</td>
                        <td>{{$letter->project->number}}</td>
                        <td>{{$letter->mozo}}</td>
                        {{--<td>{{$letter->body}}</td>--}}
                        <td>{{$letter->lettertype->name}}</td>
                        <td>{{jDate::forge($letter->created_at)->format('%Y/%m/%d')}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$letters->links()}}
        </div>
    </div>

    {{--<html>--}}
    {{--<div class="pop">--}}
        {{--<img src="http://patyshibuya.com.br/wp-content/uploads/2014/04/04.jpg" style="width: 400px; height: 264px;">--}}
    {{--</div>--}}

    {{--<div class="pop">--}}
        {{--<img src="http://upload.wikimedia.org/wikipedia/commons/2/22/Turkish_Van_Cat.jpg" style="width: 400px; height: 264px;">--}}
    {{--</div>--}}

    {{--<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-body">--}}
                    {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
                    {{--<img src="" class="imagepreview" style="width: 100%;" >--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--</html>--}}


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

                                    <div class="form-group">
                                        {!! Form::label('body','محتوا:') !!}
                                        {!! Form::text('body',null,['class'=>'form-control','readonly']) !!}
                                    </div>
                                    {!! Form::label('project','عنوان پروژه:') !!}
                                    {!! Form::textarea('project',null,['class'=>'form-control' ,'readonly','cols'=>'40', 'rows'=>'2','style'=>'text-align:center']) !!}
                                </div>
                            </div>
                        </div>
                        </thead>
                        <tbody>
                        <div class="col-xs-2">

                            <div class="form-group">
                                {!! Form::label('be','به:') !!}
                                {!! Form::text('be',null,['class'=>'form-control','readonly']) !!}
                            </div>

                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('description','توضیحات:') !!}
                                {!! Form::text('description',null,['class'=>'form-control','readonly']) !!}
                            </div>


                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('az','از:') !!}
                                {!! Form::text('az',null,['class'=>'form-control','readonly']) !!}
                            </div>


                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('attachment','پیوست:') !!}
                                {!! Form::select('attachment',array( '1'=>'دارد','0'=> 'ندارد',),1,['class'=>'form-control','readonly']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('projectnumber','شماره پرونده:') !!}
                                {!! Form::text('projectnumber',null,['class'=>'form-control','readonly']) !!}
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('recivedate','تاریخ ثبت:') !!}
                                {!! Form::text('recivedate',null,['class'=>'form-control','readonly']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('lettertype','نوع نامه:') !!}
                                {!! Form::text('lettertype',null,['class'=>'form-control','readonly']) !!}
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::label('number','شماره نامه:') !!}
                                {!! Form::text('number',null,['class'=>'form-control','readonly']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('mozo','موضوع:') !!}
                                {!! Form::text('mozo',null,['class'=>'form-control','readonly']) !!}
                            </div>

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

    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}"></script>
    <script type="text/javascript" >
        $(function() {
            $('#myModal').on("show.bs.modal", function (e) {
                $("#data-id").html($(e.relatedTarget).data('id'));
                $("#myModalLable").html($(e.relatedTarget).data('name'));
                $("#modal-title").html($(e.relatedTarget).data('name'));
                $("#number").val($(e.relatedTarget).data('number'));
                $("#mozo").val($(e.relatedTarget).data('mozo'));
                $("#body").val($(e.relatedTarget).data('body'));
                $("#project").val($(e.relatedTarget).data('project'));
                $("#projectnumber").val($(e.relatedTarget).data('projectnumber'));
                $("#az").val($(e.relatedTarget).data('az'));
                $("#be").val($(e.relatedTarget).data('be'));
                $("#date").val($(e.relatedTarget).data('date'));
                $("#lettertype").val($(e.relatedTarget).data('lettertype'));
                $("#description").val($(e.relatedTarget).data('description'));
                $("#attachment").val($(e.relatedTarget).data('attachment'));
                $("#recivedate").val($(e.relatedTarget).data('recivedate'));


            });
        });

//        <script type="text/javascript" >
        $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        });
    {{--</script>--}}

    </script>

@stop