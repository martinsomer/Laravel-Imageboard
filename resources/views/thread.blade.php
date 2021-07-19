@extends('app')

@section('header')
    {{ $thread->board->name }}
@endsection

@section('content')
    <div class="flex-col center-v center-h">
        Reply To Thread
        <form action="/reply" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input value="{{ $thread->id }}" name="thread_id" class="hidden">
            
            <textarea rows=4 name="comment" placeholder="Comment" maxlength=255 class="block width-15r block margin-b-p25r no-resize border-box"></textarea>
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

    <hr>

    <div class="flex-row width-100p">
        <a href="{{ asset('img/original/' . $thread->file_name) }}">
            <img src="{{ asset('img/' . $thread->file_name) }}" class="thumbnail">
        </a>
        <div>
            <div class="fnt-small italic clr-gray-100">{{ $thread->created_at }}</div>
            <div class="fnt-bold fnt-title">{{ $thread->subject }}</div>
            <div class="fnt-normal linebreaks">{{ $thread->comment }}</div>
        </div>
    </div>

    @if (count($thread->replies) > 0)
        @foreach ($thread->replies as $reply)
            <hr>
            <div class="flex-row width-100p margin-l-1r">
                @if ($reply->file_name !== NULL)
                <a href="{{ asset('img/original/' . $reply->file_name) }}">
                    <img src="{{ asset('img/' . $reply->file_name) }}" class="thumbnail">
                </a>
                @endif
                <div>
                    <div class="fnt-small italic clr-gray-100">{{ $reply->created_at }}</div>
                    <div class="fnt-normal linebreaks">{{ $reply->comment }}</div>
                </div>
            </div>
        @endforeach
    @else
        <hr>
        This thread has no replies.
    @endif
@endsection

@section('footer')
    <a href="{{ url('/') }}" class="no-decoration fnt-normal clr-black hvr-underline">[Home]</a>
    <a href="{{ url('/b/' . $thread->board->id) }}" class="no-decoration fnt-normal clr-black hvr-underline margin-l-1r">[Board Index]</a>
@endsection