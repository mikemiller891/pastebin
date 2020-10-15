@extends('paste.layout')

@section('content')
    <form action="/{{ $key }}" method="post" class="relative w-full h-full">@csrf
        <div class="w-full h-full overflow-hidden">
            <div class="w-full h-full p-4 overflow-y-scroll font-mono text-white whitespace-pre-wrap bg-black resize-none">{{ $content }}</div>
        </div>
        <div class="absolute bottom-0 right-0 pb-4 pr-8">
            <button name="action" value="fork" class="px-4 py-0 font-black text-black bg-blue-500 rounded-full opacity-50 hover:text-white focus:text-white hover:opacity-100 focus:opacity-100 focus:outline-none">Fork</button>
            <button name="action" value="new" class="px-4 py-0 font-black text-black bg-orange-500 rounded-full opacity-50 hover:text-white focus:text-white hover:opacity-100 focus:opacity-100 focus:outline-none">New</button>
        </div>
    </form>
@endsection
