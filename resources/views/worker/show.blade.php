@extends('layout.main')
@section('content')

    <body>
    <div>
        <hr>
        <div>
            <div>name:{{$worker->name}}</div>
            <div>surname:{{$worker->surname}}</div>
            <div>email:{{$worker->email}}</div>
            <div>age:{{$worker->age}}</div>
            <div>description:{{$worker->description}}</div>
        </div>
        <div>
            <a href="{{ route('worker.index', $worker->id)}}">Назад</a>
        </div>
        <hr>
    </div>
@endsection
