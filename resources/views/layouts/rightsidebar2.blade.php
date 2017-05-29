<!DOCTYPE html>
<html lang="fa">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    {{--<![endif]-->--}}


    @yield('styles')
</head>

<body id="admin-page"  style="direction : rtl;">

<div id="wrapper" dir="rtl">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin: 0;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/rca/public/admin">خانه</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>    {{ Auth::user()->name }}    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="login"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        {{--<div class="navbar-default sidebar" role="navigation">--}}
            {{--<div class="sidebar-nav navbar-collapse">--}}
                {{--<ul class="nav" id="side-menu">--}}

    </nav>
                    {{--<div>--}}
                    {{--<li class="sidebar-search">--}}
                        {{--<div class="input-group custom-search-form">--}}
                            {{--<input type="text" class="form-control" placeholder="Search...">--}}
                            {{--<div class="row">--}}
                                {{--{!! Form::open(array('route' => 'admin.persons.result', 'class'=>'form navbar-form navbar-right searchform'))!!}--}}

                                {{--{!! Form::text('searchbox', null,--}}
                                                       {{--array('required',--}}
                                                       {{--'dir'=>'rtl',--}}
                                                            {{--'class'=>'form-control',--}}
                                                            {{--'placeholder'=>'با نام یا کدملی',--}}
                                                            {{--'style'=>'margin-right: 0px;min-width: 166px;')) !!}--}}
                                {{--{!! Form::submit('جستجو', array('class'=>'btn btn-default', 'style'=>'margin-right: 5px;')) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--{!! Form::open(array('route' => 'admin.projects.result', 'class'=>'form navbar-form navbar-right searchform'))!!}--}}

                                {{--{!! Form::text('searchbox', null,--}}
                                                       {{--array('required',--}}
                                                       {{--'dir'=>'rtl',--}}
                                                            {{--'class'=>'form-control',--}}
                                                            {{--'placeholder'=>'با کلمه کلیدی یا شماره پرونده',--}}
                                                            {{--'style'=>'margin-right: 0px;min-width: 166px;')) !!}--}}
                                {{--{!! Form::submit('جستجو', array('class'=>'btn btn-default', 'style'=>'margin-right: 5px;')) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}

                            {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="button">--}}
                            {{--<i class="fa fa-search"></i>--}}
                            {{--</button>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<!-- /input-group -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/rca/public/admin"><i class="fa fa-dashboard fa-fw"></i> میز کار</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-edit fa-fw"></i>اطلاعات پایه<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                            {{--<a href="{{route('admin.definitions.index')}}">انواع نامه</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="{{route('admin.definitions.index')}}">انواع مقاطع دفاع از پروژه ها</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.universities.index')}}">دانشگاه ها</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.fields.index')}}">رشته های تحصیلی</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.majors.index')}}">گرایش های تحصیلی</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.units.index')}}">معاونت های تخصصی</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.groups.index')}}">گروه های تخصصی</a>--}}
                            {{--</li>--}}


                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-bank fa-fw"></i>طرح های همکاران تحقیقاتی <span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.persons.index')}}"> لیست همکاران تحقیقاتی </a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.persons.create')}}">ثبت همکار تحقیقاتی جدید</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.projects.index')}}">لیست پروژه ها </a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.projects.create')}}">ثبت پروژه جدید</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">ثبت نامه های رسیده</a>--}}
                            {{--</li>--}}


                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-users fa-fw"></i>طرح های پرسنل کادر <span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.cadrs.index')}}">لیست پرسنل کادر</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.cadrs.create')}}">ثبت پرسنل کادر</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.cadrprojects.index')}}">لیست پروژه کادر</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.cadrprojects.create')}}">ثبت پروژه کادر جدید</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.persons.create')}}">ثبت مقاطع پیشرفت پروژه</a>--}}
                            {{--</li>--}}


                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-user fa-fw"></i> افراد<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.persons.index')}}">نمایش افراد</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.persons.create')}}">معرفی افراد</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-chevron-circle-up fa-fw"></i> کاربران<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.users.index')}}">نمایش کاربران</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.users.create')}}">ساخت کاربر</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-files-o fa-fw"></i> پیگیری سریع<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="blank.html">Blank Page</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="rca/public/login">Login Page</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-certificate fa-fw"></i> Posts<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.posts.index')}}">All Posts</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.posts.create')}}">Create Post</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> Categories<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.categories.index')}}">All Categories</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.categories.create')}}">Create Category</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> Media<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.media.index')}}">All Media</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('admin.media.create')}}">Create Media</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> بیلان‌ها<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="flot.html">Flot Charts</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="morris.html">Morris.js Charts</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>--}}
                    {{--</li>--}}


                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="#">Second Level Item</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Second Level Item</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">Third Level <span class="fa arrow"></span></a>--}}
                                {{--<ul class="nav nav-third-level">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Third Level Item</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Third Level Item</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Third Level Item</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Third Level Item</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<!-- /.nav-third-level -->--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}

                    {{--</div>--}}



                    {{--start of right sidebar--}}


                    <link rel="stylesheet" href="{{asset('rightsidebar/font-awesome.min.css')}}">

                    <style>

                        .fa-2x {
                            font-size: 2em;
                        }

                        .fa {
                            position: relative;
                            display: table-cell;
                            width: 60px;
                            height: 36px;
                            text-align: center;
                            vertical-align: middle;
                            font-size:20px;
                        }


                        .main-menu:hover,nav.main-menu.expanded {
                            width:250px;
                            overflow:visible;
                        }

                        .main-menu {
                            background:#fbfbfb;
                            border-right:1px solid #e5e5e5;
                            position:absolute;
                            top:50px;
                            bottom:0;
                            height:100%;
                            right:0;
                            width:60px;
                            overflow:hidden;
                            -webkit-transition:width .05s linear;
                            transition:width .05s linear;
                            -webkit-transform:translateZ(0) scale(1,1);
                            z-index:1000;

                        }

                        .main-menu>ul {
                            margin:7px 0;
                        }

                        .main-menu li {
                            position:relative;
                            display:block;
                            width:250px;
                        }

                        .main-menu li>a {
                            position:relative;
                            display:table;
                            border-collapse:collapse;
                            border-spacing:0;
                            color:#999;
                            font-family: arial;
                            font-size: 14px;
                            text-decoration:none;
                            -webkit-transform:translateZ(0) scale(1,1);
                            -webkit-transition:all .1s linear;
                            transition:all .1s linear;

                        }

                        .main-menu .nav-icon {
                            position:relative;
                            display:table-cell;
                            width:60px;
                            height:36px;
                            text-align:center;
                            vertical-align:middle;
                            font-size:18px;
                        }

                        .main-menu .nav-text {
                            position:relative;
                            display:table-cell;
                            vertical-align:middle;
                            width:190px;
                            font-family: 'Titillium Web', sans-serif;
                        }

                        .main-menu>ul.logout {
                            position:absolute;
                            left:0;
                            bottom:0;
                        }

                        .no-touch .scrollable.hover {
                            overflow-y:hidden;
                        }

                        .no-touch .scrollable.hover:hover {
                            overflow-y:auto;
                            overflow:visible;
                        }

                        a:hover,a:focus {
                            text-decoration:none;
                        }

                        nav {
                            -webkit-user-select:none;
                            -moz-user-select:none;
                            -ms-user-select:none;
                            -o-user-select:none;
                            user-select:none;
                        }

                        nav ul,nav li {
                            outline:0;
                            margin:0;
                            padding:0;
                        }
                        .main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
                            color:#fff;
                            background-color:#5fa2db;
                        }
                        .area {
                            float: left;
                            background: #e2e2e2;
                            width: 100%;
                            height: 100%;
                        }
                        @font-face {
                            font-family: 'Titillium Web';
                            font-style: normal;
                            font-weight: 300;
                            src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
                        }

                    </style>


                    <div class="area"></div><nav class="main-menu">
                        <ul class="fa-ul">
                            <li>
                                <a href="#">
                                    <i class="fa fa-home"></i>
                                    <span class="nav-text">
                            میز کار
                        </span>
                                </a>

                            </li>
                            <li class="has-subnav">
                                <a href="#">
                                    <i class="fa fa-laptop fa-2x"></i>
                                    <span class="nav-text">
                           همکاران تحقیقاتی
                        </span>
                                </a>

                            </li>
                            <li class="has-subnav">
                                <a href="#">
                                    <i class="fa fa-list fa-2x"></i>
                                    <span class="nav-text">
                            پرسنل کادر
                        </span>
                                </a>

                            </li>
                            <li class="has-subnav">
                                <a href="#">
                                    <i class="fa fa-folder-open fa-2x"></i>
                                    <span class="nav-text">
                            اطلاعات پایه
                        </span>
                                </a>

                            </li>
                            <li class="dropdown">
                                <a href="#">

                                    <i class="fa fa-bar-chart-o fa-2x"></i>
                                    <span class="nav-text">
                            <span class="fa-dropbox">
                                new nav
                            </span>
                            Graphs and Statistics
                        </span>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-header">Dropdown heading</li>
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-font fa-2x"></i>
                                    <span class="nav-text">
                            Typography and Icons
                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-table fa-2x"></i>
                                    <span class="nav-text">
                            Tables
                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-map-marker fa-2x"></i>
                                    <span class="nav-text">
                            Maps
                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-info fa-2x"></i>
                                    <span class="nav-text">
                            Documentation
                        </span>
                                </a>
                            </li>
                        </ul>

                        <ul class="logout">
                            <li>
                                <a href="#">
                                    <i class="fa fa-power-off fa-2x"></i>
                                    <span class="nav-text">
                            Logout
                        </span>
                                </a>
                            </li>
                        </ul>
                    </nav>


                    {{--end of right sidebar--}}




                {{--</ul>--}}
            {{--</div>--}}
            {{--<!-- /.sidebar-collapse -->--}}
        {{--</div>--}}
        {{--<!-- /.navbar-static-side -->--}}


    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>

                    @yield('content')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>


@yield('scripts')

</body>

</html>
