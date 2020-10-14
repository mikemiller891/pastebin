@extends('paste.layout')

@section('content')
    <form action="/" method="post" class="relative h-full w-full">@csrf
        <div class="h-full w-full overflow-hidden">
            <textarea name="content" autofocus class="h-full w-full font-mono resize-none p-4 whitespace-pre-wrap overflow-y-scroll">{{ $content ?? '' }}</textarea>
        </div>
        <div class="absolute bottom-0 right-0 pb-4 pr-8">
            <button name="action" value="save" class="bg-green-500 hover:text-white uppercase py-0 px-4 rounded-full opacity-50 hover:opacity-100">Save</button>
            <button name="action" value="cancel" class="bg-red-500 hover:text-white uppercase py-0 px-4 rounded-full opacity-50 hover:opacity-100">Cancel</button>
        </div>
    </form>
@endsection
