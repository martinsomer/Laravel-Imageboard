@extends('app')

@section('header')
    {{ $board->name }}
@endsection

@section('content')
    <div class="flex-col center-v center-h">
        Create New Thread
        <form action="/thread" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input value="{{ $board->id }}" name="board_id" class="hidden">
            
            <input type="text" name="subject" placeholder="Subject" maxlength=32 class="block width-15r margin-b-p25r border-box">
            <textarea rows=4 name="comment" placeholder="Comment" maxlength=255 class="block width-15r margin-b-p25r no-resize border-box"></textarea>
            <div class="width-15r flex-row" style="justify-content: space-between">
                <input type="file" name="image" accept="image/png, image/jpeg">
                <button type="submit">Post</button>
            </div>
        </form>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 padding-p5r margin-t-b-p4r radius-p5">
            @foreach($errors->getMessages() as $error)
                <div class="clr-white fnt-normal">{{$error[0]}}</div>
            @endforeach
        </div>
    @endif
    
    @if (count($board->threads) > 0)
        @foreach ($board->threads as $thread)
            <hr>
            <div class="flex-row width-100p">
                <a href="{{ asset('img/original/' . $thread->file_name) }}">
                    <img src="{{ asset('img/' . $thread->file_name) }}" class="thumbnail">
                </a>
                <div>
                    <div class="fnt-small italic clr-gray-100">
                        Replies: {{ $thread->replies_count }} | {{ $thread->created_at }}
                    </div>
                    <a href="{{ url('/t/' . $thread->id) }}" class="no-decoration fnt-bold fnt-title clr-black hvr-underline">
                        {{ $thread->subject }}
                    </a>
                    <div class="fnt-normal linebreaks">{{ $thread->comment }}</div>
                </div>
            </div>
        @endforeach
    @else
        <hr>
        No threads to show.
    @endif
@endsection

@section('footer')
    <a href="{{ url('/') }}" class="no-decoration fnt-normal clr-black hvr-underline">[Home]</a>
@endsection