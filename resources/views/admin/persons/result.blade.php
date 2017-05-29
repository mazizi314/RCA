@extends('layouts.admin')

@section('content')
    {{--    {{dd($persons)}}--}}

    @if(\Illuminate\Support\Facades\Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}} </p>

    @endif
    <h1 dir="rtl">نتایج جستجو</h1>
    @if(count($persons)>0)
        <table dir="rtl" class="table table-condensed table-striped table-bordered table-hover text-center">
            <thead >
            <tr>
                {{--<th>تصویر</th>--}}
                <td>ویرایش</td>
                <td>نام و نام خانوادگی</td>
                <td>شماره پرونده</td>
                {{--<td>نامه‌ها</td>--}}
                {{--<td>نامه‌ها</td>--}}
                {{--<th>نام پدر</th>--}}
                {{--<th>Email</th>--}}
                {{--<th>محل تحصیل</th>--}}

                <td>آخرین نامه</td>
                <td>رشته تحصیلی</td>
                <td>شماره همراه</td>
                <td>چاپ فرم ها</td>
                <td>تاریخ تشکیل</td>
                <td>کد ملی</td>
                {{--<th>فعال</th>--}}
                {{--<th>Created</th>--}}
                {{--<th>Updated</th>--}}
            </tr>
            </thead>
            <tbody>
            @if($persons)
                @foreach($persons as $person)
                    <tr>
                        <div>
                            {{--<td>{{$person->id}}</td>--}}
                            {{--If you use bootstrap, you might use this -
         <img src="{{URL::asset('/image/propic.png')}}" alt="profile Pic" height="200" width="200">
        **inside public folder create a new folder named "image" then put your images there.
         Using URL::asset() you can directly access to the "public" folder.--}}
                            {{--<td><a href="{{route('admin.persons.edit',$person->id)}}" ><img height="50px" width="50px" src="{{$person->photo ? $person->photo->file : '../images/padafandlogo.jpg'}}" alt="" class="img-responsive img-rounded"></a></td>--}}
                            {{--<td><a href="{{route('admin.persons.edit',$person->id)}}" >{{$person->fname}} {{$person->lname}}</a></td>--}}
                            {{--<td><img height="50px" width="50px" src="{{$person->photo ? $person->photo->file : '../images/padafandlogo.jpg'}}" alt="" class="img-responsive img-rounded"></td>--}}
                            {{--<td><img height="50" src="{{$user->photo ? $user->photo->file:'no user photo' }}" alt=""></td>--}}
                            {{--<td><a href="{{route('admin.persons.edit',$person->id)}}" >ویرایش</a></td>--}}
                            {{--data-toggle="modal" data-target="#myModal"--}}

                            {{--<td>{{$person->fathername}}</td>--}}
                            {{--<td>{{$person->email}}</td>--}}
                            {{--<td>{{$person->university->name}}</td>--}}

                            {{--<td>{{$person->is_active==1?'فعال':'غیر فعال'}}</td>--}}
                            {{--<td>{{$person->created_at->diffForHumans()}}</td>--}}
                            {{--<td>{{$person->updated_at}}</td>--}}

                        </div>
                        <td><a href="{{route('admin.persons.edit',$person->id)}}" ><img height="30px" width="30px" src="{{$person->photo ?asset($person->photo->file) : asset('images/padafandlogo.jpg')}}" alt="" class="img-responsive img-rounded">
                        <td><a href=""
                               data-toggle="modal"
                               data-target="#myModal"
                               data-id= "{{$person->id}}"
                               data-name = "  {{$person->fname}} {{$person->lname}}"
                               data-fname = "{{$person->fname}}"
                               data-lname = "{{$person->lname}}"
                               data-cardnumber ="{{"$person->cardnumber"}}"
                               data-fathername ="{{$person->fathername}}"
                               data-birthdate ="{{$person->birthdate}}"
                               data-cellphone ="{{$person->cellphone}}"
                               data-telephone ="{{$person->telephone}}"
                               data-address ="{{$person->address}}"
                               data-postalcode ="{{$person->postalcode}}"
                               data-email ="{{$person->email}}"
                               data-degree="{{$person->degree_id}}"
                               data-service="{{$person->service_id}}"
                               data-university ="{{$person->university->name}}"
                               data-field ="{{$person->field->name}}"
                               data-major ="{{$person->major->name}}"
                               {{--For Project Letters--}}

                               @if(count($person->projects)!=0)
                               @foreach($person->projects as $project)
                               @if(count($project->letters)!=0)


                               data-letters="{{$project->letters}}"

                               @endif
                               @endforeach
                               @endif
                               {{--End Of Project Letters--}}


                               {{--if person has JUST One project--}}
                               @if(count($person->projects)==1)
                               @foreach($person->projects as $project)
                               data-projectname ="{{$project->title}}"
                               data-projectnumber="{{$project->number}}"
                               data-projectcategory="{{$project->category_id}}"
                               data-projectopendate="{{$project->opendate}}"
                               data-kasri1="{{$project->kasri1}}"
                               data-kasri2="{{$project->kasri2}}"
                               data-kasri3="{{$project->kasri3}}"
                               data-unit="{{$project->unit->name}}"
                               data-group="{{$project->group->name}}"
                               data-bookcount="{{$project->bookcount}}"
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
                               @endforeach
                               @endif
                               {{--End of IF Just One project--}}
                               {{--If person has more than one project, the last one considred--}}
                               @if(count($person->projects)>1)
                               @foreach($person->projects as $project)
                               @endforeach
                               data-projectname ="{{$project->title}}"
                               data-projectnumber="{{$project->number}}"
                               data-projectcategory="{{$project->category_id}}"
                               data-projectopendate="{{$project->opendate}}"
                               data-kasri1="{{$project->kasri1}}"
                               data-kasri2="{{$project->kasri2}}"
                               data-kasri3="{{$project->kasri3}}"
                               data-unit="{{$project->unit->name}}"
                               data-group="{{$project->group->name}}"
                               data-bookcount="{{$project->bookcount}}"
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
                               @endif
                               {{--End If more than one--}}
                               @if(count($person->projects)==0)
                               {{--@ foreach($person->projects as $project)--}}
                               data-defencelevel="پرونده ندارد"
                               @else
                               @if(count($project->defencelevels)!=0)
                               @foreach($project->defencelevels as $defencelevel)
                               @endforeach
                               data-defencelevel="{{$defencelevel->name}}"
                               data-defencedate="{{$defencelevel->pivot->defencedate}}"
                               @else
                               data-defencelevel=" دفاعی انجام نشده است"
                               @endif
                               {{--@endforeach--}}
                               @endif
                               @if(count($person->projects)!=0)
                               @foreach($person->projects as $project)
                               @if(count($project->letters)!=0)
                               @foreach($project->letters as $letter)
                               @endforeach
                               data-status="{{$letter->lettertype->name}}"
                               @else
                               data-status="نامه‌ای ثبت نشده است  "
                               @endif
                               @endforeach
                               @else
                               data-status=" پرونده‌ای تشکیل نشده است"
                                    @endif

                            >{{$person->fname}} {{$person->lname}}</a></td>
                        <td> @if(count($person->projects)!=0)
                                @foreach($person->projects as $project)
                                    <a href="{{route('admin.projects.show',$project->id)}}" >  {{$project->number}}  </a>
                                @endforeach
                            @else
                                <a href="{{route('admin.projects.create')}}" >تشکیل پرونده</a>  <br>
                            @endif
                        </td>
                        {{--<td>--}}
                        {{--@if(count($person->projects)!=0)--}}
                        {{--@foreach($person->projects as $project)--}}
                        {{--@if(count($project->letters)!=0)--}}

                        {{--<a href=""--}}
                        {{--data-toggle="modal"--}}
                        {{--data-target="#lettersModal"--}}

                        {{--@if(count($person->projects)!=0)--}}
                        {{--@foreach($person->projects as $project)--}}
                        {{--data-id= "{{$project->id}}"--}}
                        {{--data-letters="{{$project->letters}}"--}}
                        {{--@endforeach--}}
                        {{--@endif--}}

                        {{-->  نامه ها</a>--}}
                        {{--@endforeach--}}
                        {{--@else--}}
                        {{--<a href="{{route('admin.letters.index')}}" >ثبت نامه</a>  <br>--}}
                        {{--@endif--}}
                        {{--@endforeach--}}
                        {{--@else--}}
                        {{--<a href="{{route('admin.projects.create')}}" >تشکیل پرونده</a>  <br>--}}
                        {{--@endif--}}
                        {{--</td>--}}
                        {{--<td> @if(count($person->projects)!=0)--}}
                        {{--@foreach($person->projects as $project)--}}
                        {{--@if(count($project->letters)!=0)--}}
                        {{--@foreach($project->letters as $letter)--}}
                        {{--<a href="{{route('admin.letters.show',$letter->id)}}" >  {{$letter->number}}  </a>--}}
                        {{--@endforeach--}}
                        {{--@else--}}
                        {{--فاقد نامه--}}
                        {{--@endif--}}
                        {{--@endforeach--}}
                        {{--@else--}}
                        {{--<a href="{{route('admin.projects.create')}}" >تشکیل پرونده</a>  <br>--}}
                        {{--@endif--}}
                        {{--</td>--}}
                        <td>   @if(count($person->projects)!=0)
                                @foreach($person->projects as $project)
                                    @if(count($project->letters)!=0)
                                        @foreach($project->letters as $letter)
                                        @endforeach
                                        {{$letter->lettertype->name}}
                                    @else
                                        نامه‌ای ثبت نشده است
                                    @endif
                                @endforeach
                            @else
                                پرونده‌ای تشکیل نشده است
                            @endif

                        </td>

                        <td>{{$person->field->name}}</td>
                        <td>{{$person->cellphone}}</td>
                        {{--<td><a href={{resource_path()}}/views/admin/persons/word/index.html>forms</a></td>--}}
                        <td><a href="../../../resources/views/admin/persons/word/index.html">فرم</a></td>
                        <td>   @if(count($person->projects)!=0)
                                @foreach($person->projects as $project)
                                    {{$project->opendate}}
                                @endforeach
                            @else
                                پرونده‌ای تشکیل نشده است
                            @endif

                        </td>



                        <td>{{$person->nationalcode}}</td>
                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
        <div class="text-center">
            {{$persons->links()}}
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
                    </div>

                    {!! Form::model($person, ['method'=>'PATCH', 'action'=>['AdminPersonsController@update', $person->id],'files'=> true]) !!}
                    {!! Form::hidden('id', '', ['id' => 'person-id']) !!}
                    <div class="modal-body">
                        <div class="container">
                            <div class="panel-group" style="max-width: 1050px;overflow-y: scroll;">
                                <div class="panel panel-default">
                                    {{--<div class="panel-heading">اطلاعات فردی</div>--}}
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-7">
                                                {!! Form::label('address','آدرس:') !!}
                                                {!! Form::textarea('address',null,['class'=>'form-control','readonly','cols'=>'40', 'rows'=>'1']) !!}
                                            </div>
                                            <div class="col-xs-5">
                                                {!! Form::label('university','محل تحصیل:') !!}
                                                {!! Form::textarea('university',null,['class'=>'form-control','readonly','cols'=>'40', 'rows'=>'1']) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-2">

                                                {!! Form::label('telephone','شماره ثابت:') !!}
                                                {!! Form::text('telephone',null,['class'=>'form-control','readonly']) !!}


                                                {{--<div class="form-group">--}}
                                                {{--{!! Form::label('is_active','Status:') !!}--}}
                                                {{--{!! Form::select('is_active',array(1=>'فعال',0=>'غیر فعال'),1,['class'=>'form-control','readonly']) !!}--}}
                                                {{--</div>--}}
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-group">
                                                    {!! Form::label('cellphone','شماره همراه:') !!}
                                                    {!! Form::text('cellphone',null,['class'=>'form-control','readonly']) !!}
                                                    {!! Form::label('service','وضعیت خدمتی:') !!}
                                                    {!! Form::select('service',array( '0'=>'مشمول', '1'=> 'مشغول',
                        '2'=>'دانشجو', ),null,['class'=>'form-control','readonly']) !!}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group">--}}

                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-group">
                                                    {!! Form::label('cardnumber','شماره شناسنامه:') !!}
                                                    {!! Form::text('cardnumber',null,['class'=>'form-control','readonly']) !!}
                                                    {!! Form::label('degree','مدرک تحصیلی:') !!}
                                                    {!! Form::select('degree',array( '1'=>'کارشناسی ارشد',
                           '0'=> 'دکتری', ),null,['class'=>'form-control','readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-group">

                                                    {!! Form::label('birthdate','تاریخ تولد:') !!}
                                                    {!! Form::text('birthdate',null,['class'=>'form-control','readonly']) !!}

                                                    {!! Form::label('postalcode','کدپستی:') !!}
                                                    {!! Form::text('postalcode',null,['class'=>'form-control','readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-group">
                                                    {!! Form::label('field','رشته تحصیلی:') !!}
                                                    {!! Form::text('field',null,['class'=>'form-control','readonly']) !!}
                                                    {!! Form::label('major','گرایش تحصیلی:') !!}
                                                    {!! Form::text('major',null,['class'=>'form-control','readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                {!! Form::label('nationalcode','کدملی:') !!}
                                                {!! Form::text('nationalcode',null,['class'=>'form-control','readonly']) !!}

                                                {!! Form::label('fathername','نام پدر:') !!}
                                                {!! Form::text('fathername',null,['class'=>'form-control' ,'readonly']) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    {{--<div class="panel-heading"> اطلاعات پروژه</div>--}}
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                {!! Form::label('projectname','عنوان پروژه:') !!}
                                                {!! Form::textarea('projectname',null,['class'=>'form-control','readonly','cols'=>'40', 'rows'=>'1']) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-2">
                                                <div class="form-group">
                                                    {!! Form::label('projectopendate','تاریخ تشکیل پرونده:') !!}
                                                    {!! Form::text('projectopendate',null,['class'=>'form-control','readonly']) !!}
                                                    {!! Form::label('group','گروه تخصصی:') !!}
                                                    {!! Form::text('group',null,['class'=>'form-control','readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-group">
                                                    {!! Form::label('defencedate','تاریخ دفاع:') !!}
                                                    {!! Form::text('defencedate',null,['class'=>'form-control','readonly']) !!}
                                                    {!! Form::label('unit','یگان تخصصی:') !!}
                                                    {!! Form::text('unit',null,['class'=>'form-control','readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-group">
                                                    {!! Form::label('cadr3','داور اول:') !!}
                                                    {!! Form::text('cadr3',null,['class'=>'form-control','readonly']) !!}

                                                    {!! Form::label('cadr4','داور دوم:') !!}
                                                    {!! Form::text('cadr4',null,['class'=>'form-control','readonly']) !!}


                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-group">
                                                    {!! Form::label('cadr5','ویراستار:') !!}
                                                    {!! Form::text('cadr5',null,['class'=>'form-control','readonly']) !!}

                                                    {!! Form::label('cadr2','استاد مشاور:') !!}
                                                    {!! Form::text('cadr2',null,['class'=>'form-control','readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-group">
                                                    {!! Form::label('status','آخرین وضعیت:') !!}
                                                    {!! Form::text('status',null,['class'=>'form-control','readonly']) !!}
                                                    {!! Form::label('cadr1','استاد راهنما:') !!}
                                                    {!! Form::text('cadr1',null,['class'=>'form-control','readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                {!! Form::label('projectnumber','شماره پرونده:') !!}
                                                {!! Form::text('projectnumber',null,['class'=>'form-control','readonly']) !!}

                                                {!! Form::label('projectcategory','نوع همکاری:') !!}
                                                {!! Form::select('projectcategory',array( '1'=>'طرح تحقیقاتی',
                    '2'=> 'طرح نخبگان',
                    '3'=>'ترجمه انگلیسی به فارسی',
                    '4'=>'ترجمه فارسی به انگلیسی',),1,['class'=>'form-control','readonly']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    {{--<div class="panel-heading"> سایر اطلاعات</div>--}}
                                    <div class="panel-body">
                                        <div class="col-xs-4">
                                            {{--<div class="well-lg" style="">--}}
                                            <div class="form-group">
                                                {!! Form::label('email','پست الکترونیکی:') !!}
                                                {!! Form::text('email',null,['class'=>'form-control','readonly','style'=>'width: 250px']) !!}
                                            </div>
                                            {{--</div>--}}
                                        </div>
                                        <div class="col-xs-2">
                                            {!! Form::label('bookcount','تعداد کتاب:') !!}
                                            {!! Form::text('bookcount',null,['class'=>'form-control','readonly']) !!}

                                        </div>
                                        <div class="col-xs-2">
                                            {!! Form::label('kasri3','کسری نخبگان:') !!}
                                            {!! Form::text('kasri3',null,['class'=>'form-control','readonly']) !!}

                                        </div>
                                        <div class="col-xs-2">
                                            {!! Form::label('kasri2','کسری آجا:') !!}
                                            {!! Form::text('kasri2',null,['class'=>'form-control','readonly']) !!}
                                        </div>
                                        <div class="col-xs-2">
                                            {!! Form::label('kasri1','کسری تحقیقات:') !!}
                                            {!! Form::text('kasri1',null,['class'=>'form-control','readonly']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{--Row Of Nothing--}}

                                {{--<div class="col-xs-8 text-center" style="    float: right;">--}}
                                {{--{{count($project->letters)}}--}}
                                {{--@if(count($project->letters)!=0)--}}
                                {{--    {{$letters=$project->letters}}--}}
                                {{--<table class="table table-condensed table-striped text-center">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                {{--<th class="text-center">شماره نامه</th>--}}
                                {{--<th class="text-center">تاریخ</th>--}}
                                {{--<th class="text-center">شماره پروژه</th>--}}
                                {{--<th class="text-center">موضوع</th>--}}

                                {{--<th class="text-center">از</th>--}}
                                {{--<th class="text-center">نوع نامه</th>--}}
                                {{--<th class="text-center">تاریخ دریافت نامه</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--{!! Form::model($letter, ['method'=>'PATCH', 'action'=>['AdminLettersController@update', $letter->id]]) !!}--}}
                                {{--                                    {{dd($letters);}}--}}
                                {{--@if($letters)--}}

                                {{--@foreach( $project->letters as $letter)--}}
                                {{--<tr>--}}
                                {{--<td>{{$letter->number}} </td>--}}
                                {{--<td>{{$letter->date}}</td>--}}
                                {{--<td>{{$letter->project->number}}</td>--}}
                                {{--<td>{{$letter->mozo}}</td>--}}

                                {{--<td>{{$letter->az}}</td>--}}
                                {{--<td>{{$letter->lettertype->name}}</td>--}}
                                {{--<td>{{$letter->created_at->diffForHumans()}}</td>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--@endif--}}
                                {{--</tbody>--}}
                                {{--</table>--}}
                                {{--@endif--}}
                                {{--</div>--}}


                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        {!! Form::hidden('id', '', ['id' => 'person-id']) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-off"> </span>Close</button>

                        {{--<a dir="rtl" data-toggle="{{route('admin.persons.edit',['id' => 'id'])}}" href="{{route('admin.persons.edit',['id' =>''])}}">{!! Form::button('ویرایش اطلاعات ',['class'=>'btn btn-primary col-sm-5'])!!} </a>--}}
                        {{--<button type="button" class="btn btn-primary" data-toggle="{{route('admin.persons.edit',$person->id)}}" href="{{route('admin.persons.edit',$person->id)}}">   ویرایش اطلاعات    </button>--}}
                        {{--<a data-toggle="modal" href="{{route('admin.persons.edit',['id' => '#data-id'])}}" data-target="#modal">کلیک کنید</a>--}}
                        {{--<button type="button" class="btn btn-primary btn-xs edit_button"--}}
                        {{--data-target="#myModal"--}}
                        {{--data-id="{{$person->id}}"--}}
                        {{--data-toggle="{{route('admin.persons.edit','data-id')}}"--}}
                        {{-->--}}
                        {{--Edit--}}
                        {{--</button>--}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div id="lettersModal" class="modal fade" role="dialog" >
            {{--<div class="modal-dialog modal-lg" style="    max-width: 800px;">--}}
            {{--<div class="modal-content">--}}
            {{--dir="rtl"--}}
            {{--<div class="modal-header">--}}
            {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
            {{--<h4 class="modal-title"--}}
            {{--id = "myModalLable"--}}
            {{--> </h4>--}}
            {{--</div>--}}
            {{--{!! Form::model($person, ['method'=>'PATCH', 'action'=>['AdminPersonsController@update', $person->id],'files'=> true]) !!}--}}
            {{--{!! Form::hidden('id', '', ['id' => 'person-id']) !!}--}}
            {{--<div class="modal-body">--}}
            {{--<div class="container">--}}
            {{--<div class="col-xs-8 text-center" style="    float: right;">--}}
            {{--{{count($project->letters)}}--}}
            {{--@if(count($project->letters)!=0)--}}
            {{--    {{$letters=$project->letters}}--}}
            {{--<table class="table table-condensed table-striped text-center">--}}
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<th class="text-center">شماره نامه</th>--}}
            {{--<th class="text-center">تاریخ</th>--}}
            {{--<th class="text-center">شماره پروژه</th>--}}
            {{--<th class="text-center">موضوع</th>--}}

            {{--<th class="text-center">از</th>--}}
            {{--<th class="text-center">نوع نامه</th>--}}
            {{--<th class="text-center">تاریخ دریافت نامه</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--{!! Form::model($letter, ['method'=>'PATCH', 'action'=>['AdminLettersController@update', $letter->id]]) !!}--}}
            {{--                                    {{dd($letters);}}--}}
            {{--@if($letters)--}}

            {{--@foreach( $project->letters as $letter)--}}
            {{--<tr>--}}
            {{--<td>{{$letter->number}} </td>--}}
            {{--<td>{{$letter->date}}</td>--}}
            {{--<td>{{$letter->project->number}}</td>--}}
            {{--<td>{{$letter->mozo}}</td>--}}

            {{--<td>{{$letter->az}}</td>--}}
            {{--<td>{{$letter->lettertype->name}}</td>--}}
            {{--<td>{{$letter->created_at->diffForHumans()}}</td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}
            {{--@endif--}}
            {{--</tbody>--}}
            {{--</table>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}


            {{--<div class="modal-footer">--}}
            {{--{!! Form::hidden('id', '', ['id' => 'person-id']) !!}--}}
            {{--<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-off"> </span>Close</button>--}}
            {{--</div>--}}
            {{--{!! Form::close() !!}--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    @endif


    {{--<script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>--}}
    {{--<script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>--}}

    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}")></script>

    {{--<script type = "text/javascript" src = "{{URL::asset('js/jquery.js')}}"></script>--}}
    <script type="text/javascript" >
        $(function() {
            $('#myModal').on("show.bs.modal", function (e) {
                $("#person-id").html($(e.relatedTarget).data('id'));
                $("#myModalLable").html($(e.relatedTarget).data('name'));
                $("#modal-title").html($(e.relatedTarget).data('name'));
                $("#fname").val($(e.relatedTarget).data('fname'));
                $("#lname").val($(e.relatedTarget).data('lname'));
                $("#cardnumber").val($(e.relatedTarget).data('cardnumber'));
                $("#birthdate").val($(e.relatedTarget).data('birthdate'));
                $("#cellphone").val($(e.relatedTarget).data('cellphone'));
                $("#fathername").val($(e.relatedTarget).data('fathername'));
                $("#telephone").val($(e.relatedTarget).data('telephone'));
                $("#address").val($(e.relatedTarget).data('address'));
                $("#postalcode").val($(e.relatedTarget).data('postalcode'));
                $("#email").val($(e.relatedTarget).data('email'));
                $("#service").val($(e.relatedTarget).data('service'));
                $("#degree").val($(e.relatedTarget).data('degree'));
                $("#university").val($(e.relatedTarget).data('university'));
                $("#field").val($(e.relatedTarget).data('field'));
                $("#major").val($(e.relatedTarget).data('major'));
                $("#projectname").val($(e.relatedTarget).data('projectname'));
                $("#projectnumber").val($(e.relatedTarget).data('projectnumber'));
                $("#projectcategory").val($(e.relatedTarget).data('projectcategory'));
                $("#projectopendate").val($(e.relatedTarget).data('projectopendate'));
                $("#kasri1").val($(e.relatedTarget).data('kasri1'));
                $("#kasri2").val($(e.relatedTarget).data('kasri2'));
                $("#kasri3").val($(e.relatedTarget).data('kasri3'));
                $("#bookcount").val($(e.relatedTarget).data('bookcount'));
                $("#unit").val($(e.relatedTarget).data('unit'));
                $("#group").val($(e.relatedTarget).data('group'));
                $("#cadr1").val($(e.relatedTarget).data('cadr1'));
                $("#cadr2").val($(e.relatedTarget).data('cadr2'));
                $("#cadr3").val($(e.relatedTarget).data('cadr3'));
                $("#cadr4").val($(e.relatedTarget).data('cadr4'));
                $("#cadr5").val($(e.relatedTarget).data('cadr5'));
                $("#defencelevel").val($(e.relatedTarget).data('defencelevel'));
                $("#defencedate").val($(e.relatedTarget).data('defencedate'));
                $("#status").val($(e.relatedTarget).data('status'));

//                $("#letters").val($(e.relatedTarget).data('letters'));
            });
        });
    </script>

@stop