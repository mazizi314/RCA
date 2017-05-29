@extends('layouts.admin')


@section('content')
    <h1> اکسل</h1>




    <div class="row">

        {!! link_to_route('admin.persons.excel',
      'Export to Excel', null,
      ['class' => 'btn btn-info'])
!!}

    </div>

@stop