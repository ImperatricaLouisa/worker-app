@extends('layout.main')
@section('content')
    <div>
        <hr>
        <a href="{{route('worker.create')}}">Добавить</a>
        <hr>
    </div>
    <div>
        <form action="{{ route('worker.index') }}">
            <input type="text" name="name" placeholder="name" value="{{ request()-> get('name')}}">
            <input type="text" name="surname" placeholder="surname" value="{{ request()-> get('surname')}}">
            <input type="email" name="email" placeholder="email" value="{{ request()-> get('email')}}">
            <input type="number" name="from" placeholder="from" value="{{ request()-> get('from')}}">
            <input type="number" name="to" placeholder="to" value="{{ request()-> get('to')}}">
            <input id="IsMarried" type="checkbox" name="is_married"
                {{ request()-> get('is_married')=='on'?'checked':''}}>
            <label for="IsMarried">Is married</label>
            <input type="submit">
        </form>
        <a href="{{ route('worker.index') }}">Сбросить</a>
    </div>
    <div>
        <hr>
        @foreach($workers as $worker)
            <div>
                <div>name:{{ $worker->name}}</div>
                <div>surname:{{ $worker->surname}}</div>
                <div>email:{{ $worker->email}}</div>
                <div>age:{{ $worker->age}}</div>
                <div>description:{{ $worker->description}}</div>
            </div>
            <div>
                <a href="{{ route('worker.show', $worker->id)}}">Просмотреть</a>
            </div>
            <div>
                <a href="{{ route('worker.edit', $worker->id)}}">Редактировать</a>
            </div>
            <form action="{{route('worker.delete',$worker->id)}}" method="Post">
                @csrf
                @method('Delete')
                <input type="submit" value="Удалить">
            </form>
            <hr>
        @endforeach
        <div class="my-nav">
            {{$workers->withQueryString()->links()}}
        </div>
    </div>
@endsection

