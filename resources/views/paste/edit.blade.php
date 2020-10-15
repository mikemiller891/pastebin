@extends('paste.layout')

@section('content')
    <form action="/" method="post" class="relative h-full w-full">@csrf
        <div class="h-full w-full overflow-hidden">
            <textarea name="content" autofocus class="h-full w-full font-mono resize-none p-4 whitespace-pre-wrap overflow-y-scroll bg-black text-white">{{ $content ?? '' }}</textarea>
        </div>
        <div class="absolute bottom-0 right-0 pb-4 pr-8">
            <button name="action" value="save" class="bg-green-500 text-black hover:text-white focus:text-white py-0 px-4 rounded-full opacity-50 hover:opacity-100 focus:opacity-100 font-black focus:outline-none">Save</button>
            <button name="action" value="cancel" class="bg-red-500 text-black hover:text-white focus:text-white py-0 px-4 rounded-full opacity-50 hover:opacity-100 focus:opacity-100 font-black focus:outline-none">Cancel</button>
        </div>
    </form>
@endsection
