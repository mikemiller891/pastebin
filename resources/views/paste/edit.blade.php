@extends('paste.layout')

@section('content')
    <form action="/" method="post" class="relative w-full h-full">@csrf
        <div class="w-full h-full overflow-hidden">
            <textarea name="content" autofocus class="w-full h-full p-4 overflow-y-scroll font-mono text-white whitespace-pre-wrap bg-black resize-none">{{ $content ?? '' }}</textarea>
        </div>
        <div class="absolute bottom-0 right-0 pb-4 pr-8">
            <button name="action" value="save" class="px-4 py-0 font-black text-black bg-green-500 rounded-full opacity-50 hover:text-white focus:text-white hover:opacity-100 focus:opacity-100 focus:outline-none">Save</button>
            <button name="action" value="cancel" class="px-4 py-0 font-black text-black bg-red-500 rounded-full opacity-50 hover:text-white focus:text-white hover:opacity-100 focus:opacity-100 focus:outline-none">Cancel</button>
        </div>
    </form>
@endsection
