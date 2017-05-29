@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl" style="text-align: center"> به سامانه مرکز تحقیقات خوش آمدید</div>

                <div class="panel-body" dir="rtl" style="display:block;        margin-left: auto;        margin-right: auto; text-align: center">
                    {{--به سامانه مرکز تحقیقات خوش آمدید.--}}

                    @inject('carbon','\Carbon\Carbon')

                    {{--<br>  --}}{{--<h2>{{$carbon::now('Asia/Tehran')}}</h2>--}}
                    {{--<h2>{{$date = jDate::forge('last sunday')->format('%B %d، %Y')}}</h2>--}}
                    <?php

                     $date = jDate::forge('now')->format('  %d %B ،  %Y ')
                    ?>
                   <h2 dir="rtl"> <br>{{ \Morilog\Jalali\jDateTime::convertNumbers($date)}}</h2>

                </div>
                <div>
                    <img height="300px" width="300px" src='images/padafandlogo2.jpg' alt="سامانه مدیریت مرکز تحقیقات" align="center" style="display: block;margin-left: auto;margin-right: auto;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
