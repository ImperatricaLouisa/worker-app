@extends('layout.main')
@section('content')
    <body>
    <div>
        <hr>
        <div>
            <form action="{{route('worker.store')}}" method="post">
                @csrf
                <div>
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px; ">
                    <input type="text" name="name" placeholder="name" value="{{old('name')}}"></div>
                <div>
                    @error('surname')
                    {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px; ">
                    <input type="text" name="surname" placeholder="surname" value="{{old('surname')}}">
                </div>
                <div>
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px; ">
                    <input type="email" name="email" placeholder="email" value="{{old('email')}}">
                </div>
                <div style="margin-bottom: 15px; ">
                    <input type="number" name="age" placeholder="age" value="{{old('age')}}">
                </div>
                <div style="margin-bottom: 15px; ">
                <textarea name="description" placeholder="description">
                    {{old('description')}}
                </textarea>
                </div>
                <div style="margin-bottom: 15px; ">
                    <input id="IsMarried" type="checkbox" name="is_married" {{old('is_married')=='on'?'checked':''}}>
                    <label for="IsMarried">Is married</label>
                </div>
                <div style="margin-bottom: 15px; "><input type="submit" value="Добавить"></div>
            </form>
        </div>
    </div>
@endsection
