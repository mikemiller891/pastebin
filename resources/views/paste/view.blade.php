@extends('paste.layout')

@section('content')
    <form action="/{{ $key }}" method="post" class="relative h-full w-full">@csrf
        <div class="h-full w-full overflow-hidden">
            <div class="h-full w-full font-mono resize-none p-4 whitespace-pre-wrap overflow-y-scroll">{{ $content }}</div>
        </div>
        <div class="absolute bottom-0 right-0 pb-4 pr-8">
            <button name="action" value="fork" class="bg-blue-500 hover:text-white uppercase py-0 px-4 rounded-full opacity-50 hover:opacity-100">Fork</button>
            <button name="action" value="new" class="bg-orange-500 hover:text-white uppercase py-0 px-4 rounded-full opacity-50 hover:opacity-100">New</button>
        </div>
    </form>
@endsection
