@extends('layouts.admin')


@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Chasboon- export Laravel Database to PDF</title>
    <style type="text/css">
        table{
            border-collapse: collapse;
        }
        tr, td{
            border: 1px solid #000;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
    @foreach ($persons as $person)
        <tr>
            <td>{{ $person->id }}</td>
            <td>{{ $person->fname }}</td>
            <td>{{ $person->lname }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>

@stop