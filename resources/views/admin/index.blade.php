@extends('layouts.admin2')

@section('content')
    <?php
    //Step1
    $db = mysqli_connect('localhost','root','root','laravel_rca')
    or die('Error connecting to MySQL server.');
    ?>
    <!--HTML Codes for Count the Persons in DB-->
    <html>
    <head>
    </head>
    <body>

    <?php
    //Step2
    $query = "SELECT count(*) FROM people";
    mysqli_query($db, $query) or die('Error querying database.');

    //Step3
    $result = mysqli_query($db, $query);
    global $personscount;
    $personscount= mysqli_fetch_array($result);

    //    mysqli_close($db);
    ?>
    </body>
    </html>

    <!--HTML Codes for Count the Projects in DB-->
    <html>
    <head>
    </head>
    <body>


    <?php
    //Step2
    $query = "SELECT COUNT(*) FROM projects";
    mysqli_query($db, $query) or die('Error querying database.');

    //Step3
    $result = mysqli_query($db, $query);
    global $projectscount;
    $projectscount= mysqli_fetch_array($result);

    //Step 4
    //    mysqli_close($db);
    ?>
    </body>
    </html>

    <!--HTML Codes for Count the Cadrs in DB-->
    <html>
    <head>
    </head>
    <body>

    <?php
    //Step2
    $query = "SELECT count(*) FROM cadrs";
    mysqli_query($db, $query) or die('Error querying database.');

    //Step3
    $result = mysqli_query($db, $query);
    global $cadrscount;
    $cadrscount= mysqli_fetch_array($result);

    //Step 4
    //    mysqli_close($db);
    ?>
    </body>
    </html>

    <!--HTML Codes for Count the Users in DB-->
    <html>
    <head>
    </head>
    <body>
    {{--<h1>PHP connect to MySQL</h1>--}}

    <?php
    //Step2
    $query = "SELECT count(*) FROM users";
    mysqli_query($db, $query) or die('Error querying database.');

    //Step3
    $result = mysqli_query($db, $query);
    global $userscount;
    $userscount= mysqli_fetch_array($result);
    //dd($row);
    //echo $row;
    //while ($row = mysqli_fetch_array($result)) {
    //    echo $row[0] . ' ' . $row['1'] . ': ' . $row['email'] . ' ' . $row['password'] .'<br />';
    //}
    //        echo $userscount[0];
    //Step 4
    mysqli_close($db);
    ?>

    </body>
    </html>
    <!-- /.row -->
    <div class="row" dir="rtl" style="margin-top: 2%;">

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">

                            <div class="huge">@php  echo $userscount[0] @endphp</div>
                            <div>کاربر</div>
                        </div>
                    </div>
                </div>
                <a href="admin/users">
                    <div class="panel-footer">
                        <span class="pull-right">مدیریت کاربران سامانه</span>
                        <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red" style="    background-color: purple; border-color: purple">
                <div class="panel-heading"  style="    background-color: purple; border-color: purple">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-star "></i>
                        </div>
                        <div class="col-xs-9 text-right" >
                            <div class="huge">@php  echo $cadrscount[0] @endphp</div>
                            <div>محققین و اساتید</div>
                        </div>
                    </div>
                </div>
                <a href="admin/cadrs">
                    <div class="panel-footer">
                        <span class="pull-right" style="    -webkit-text-fill-color: purple;">لیست محقیقن و اساتید پایور</span>
                        <span class="pull-left"><i class="fa fa-arrow-circle-left" style="    color: purple;"></i></span>

                        <div class="clearfix"></div>
                        {{--<div class="panel-body">--}}
                        {{--<div class="box-content right">Web Analytics</div>--}}
                        {{--</div>--}}


                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading" style="    background-color: chocolate;">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-folder-open fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">@php  echo $projectscount[0] @endphp</div>
                            <div>پروژه تحقیقاتی</div>
                        </div>
                    </div>
                </div>
                <a href="admin/projects">
                    <div class="panel-footer">
                        <span class="pull-right">لیست پروژه‌های تحقیقاتی</span>
                        <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6" dir="rtl">
            <div class="panel panel-green" dir="rtl">
                <div class="panel-heading" dir="rtl">
                    <div class="row" dir="rtl">
                        <div class="col-xs-3" dir="rtl">
                            <i class="fa fa-address-book fa-5x" dir="rtl"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">@php  echo $personscount[0] @endphp</div>
                            <div>همکار تحقیقاتی</div>
                        </div>
                    </div>
                </div>
                <a href="admin/persons">
                    <div class="panel-footer" dir="rtl">
                        <span class="pull-right">لیست همکاران تحقیقاتی</span>
                        <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <!-- /.row -->
    <div class="row" dir="rtl" style="margin-top: 1%;">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">افزودن</div>
                <div class="panel-body" style="text-align: center;">
                    <div class="col-xs-4">
                        <a href="{{route('admin.letters.create')}}" class="btn btn-success btn-lg" style="color:white;min-width: 240px;">
                            <span class="glyphicon glyphicon-envelope"></span> افزودن نامه جدید
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{route('admin.projects.create')}}" class="btn btn-success btn-lg" style="color:white;min-width: 240px;">
                            <span class="	glyphicon glyphicon-folder-open"></span> افزودن پرونده جدید
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{route('admin.persons.create')}}" class="btn btn-success btn-lg"style="color:white;min-width: 240px;">
                            <span class="	glyphicon glyphicon-education"></span> افزودن همکار تحقیقاتی جدید
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">پیگیری سریع و جستجو در پایگاه داده‌ها</div>
            <div class="panel-body">

                <div class="col-xs-4">
                    {!! Form::open(array('route' => 'admin.letters.result', 'class'=>'form navbar-form navbar-right searchform'))!!}
                    {!! Form::label('searchbox','جستجوی در میان نامه‌ها :',array('style'=>'font-size: medium')) !!}
                    {!! Form::text('searchbox', null,
                                           array('required',
                                           'dir'=>'rtl',
                                                'class'=>'form-control',
                                                'placeholder'=>'موضوع یا شماره نامه را وارد نمایید',
                                                'style'=>'margin-right: 3px;min-width: 250px;')) !!}
                    {!! Form::submit('جستجو', array('class'=>'btn btn-default', 'style'=>'margin-right: 5px;display:;')) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-xs-4">
                    {!! Form::open(array('route' => 'admin.projects.result', 'class'=>'form navbar-form navbar-right searchform'))!!}
                    {!! Form::label('searchbox','جستجوی در میان پرونده‌ها:',array('style'=>'font-size: medium')) !!}
                    {!! Form::text('searchbox', null,
                                           array('required',
                                           'dir'=>'rtl',
                                                'class'=>'form-control',
                                                'placeholder'=>' عنوان پروژه یا شماره پرونده را وارد نمایید',
                                                'style'=>'margin-right: 3px;min-width: 250px;font-size: 12px;')) !!}
                    {!! Form::submit('جستجو', array('class'=>'btn btn-default', 'style'=>'margin-right: 5px;display:;')) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-xs-4">
                    {!! Form::open(array('route' => 'admin.persons.result', 'class'=>'form navbar-form navbar-right searchform'))!!}
                    {!! Form::label('searchbox','جستجوی در میان همکاران تحقیقاتی:',array('style'=>'font-size: medium')) !!}
                    {!! Form::text('searchbox', null,
                                           array('required',
                                           'dir'=>'rtl',
                                                'class'=>'form-control',
                                                'placeholder'=>'نام یا کدملی همکار تحقیقاتی را وارد نمایید',
                                                'style'=>'margin-right: 3px;min-width: 250px;')) !!}
                    {!! Form::submit('جستجو', array('class'=>'btn btn-default ', 'style'=>'margin-right: 5px; display:;')) !!}
                    {!! Form::close() !!}
                </div>



            </div>
            {{--<div class="panel-footer" dir="rtl"> </div>--}}
        </div>
        </div>

    </div>

    {{--Alarams Table--}}
    <div class="row">
        {{--<div class="col-lg-12">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">--}}
        {{--<i class="fa fa-bell fa-fw"></i> Activity--}}
        {{--</div>--}}
        {{--<!-- /.panel-heading -->--}}
        {{--<div class="panel-body">--}}
        {{--<div class="list-group">--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-comment fa-fw"></i> New Comment--}}
        {{--<span class="pull-right text-muted small"><em>4 minutes ago</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-twitter fa-fw"></i> 3 New Followers--}}
        {{--<span class="pull-right text-muted small"><em>12 minutes ago</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-envelope fa-fw"></i> Message Sent--}}
        {{--<span class="pull-right text-muted small"><em>27 minutes ago</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-tasks fa-fw"></i> New Task--}}
        {{--<span class="pull-right text-muted small"><em>43 minutes ago</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-upload fa-fw"></i> Server Rebooted--}}
        {{--<span class="pull-right text-muted small"><em>11:32 AM</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-bolt fa-fw"></i> Server Crashed!--}}
        {{--<span class="pull-right text-muted small"><em>11:13 AM</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-warning fa-fw"></i> Server Not Responding--}}
        {{--<span class="pull-right text-muted small"><em>10:57 AM</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed--}}
        {{--<span class="pull-right text-muted small"><em>9:49 AM</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<a href="#" class="list-group-item">--}}
        {{--<i class="fa fa-money fa-fw"></i> Payment Received--}}
        {{--<span class="pull-right text-muted small"><em>Yesterday</em>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--<!-- /.list-group -->--}}
        {{--<a href="#" class="btn btn-default btn-block">View all</a>--}}
        {{--</div>--}}
        {{--<!-- /.panel-body -->--}}
        {{--</div>--}}
        {{--<!-- /.panel -->--}}
        {{--</div>--}}
        {{--<!-- /.col-lg-8 -->--}}
    </div>

    <!-- /.row -->


    <div id="re">

    </div>

    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>

    <script type="text/javascript">
        setInterval(a,10000)
        function a() {
            $.ajax({
                url:'/rca/public/ali',
                dataType:'html',
                data:{},
            }).done(function (result) {
                $('#re').html(result);
            })
        }

    </script>
@stop

