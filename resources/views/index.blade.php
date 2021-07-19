@extends('app')

@section('header')
    {{ config('app.name') }}
@endsection

@section('content')
    <div class="flex-row flex-wrap">
        @if (count($categories) > 0)
            @foreach ($categories as $category)
                <div class="width-33p margin-t-1r">
                    <div class="underline fnt-bold fnt-title">
                        {{ $category->name }}
                    </div>
                    
                    @if (count($category->boards) > 0)
                        @foreach ($category->boards as $board)
                                <a href="{{ url('/b/' . $board->id) }}" class="fnt-normal no-decoration clr-black block hvr-underline">
                                    {{ $board->name }}
                                </a>
                        @endforeach
                    @else
                        <div class="fnt-normal italic clr-gray-100">
                            No boards
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <div class="mrgn-0-auto italic">
                No categories to show
            </div>
        @endif
    </div>
@endsection
