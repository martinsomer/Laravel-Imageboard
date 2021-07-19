@extends('app')

@section('header')
    Login
@endsection

@section('content')
    <div class="flex-col center-v center-h">
        <form action="/login" method="POST">
            {{ csrf_field() }}
            
            <input type="text" name="username" placeholder="Username" class="block width-15r margin-b-p25r border-box">
            <input type="password" name="password" placeholder="Password" class="block width-15r margin-b-p25r border-box">
            <button type="submit">Login</button>
        </form>
    </div>
    
    @if($errors->any())
        <div class="bg-red-100 padding-p5r margin-t-b-p4r radius-p5">
            @foreach($errors->getMessages() as $error)
                <div class="clr-white fnt-normal">{{$error[0]}}</div>
            @endforeach
        </div>
    @endif
@endsection