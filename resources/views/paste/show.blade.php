@extends('layout.pastebin')

@section('content')

    <form class="h-full w-full overflow-hidden" action="/{{ $key }}" method="post">@csrf
        <div class="h-full w-full bg-white dark:bg-black text-black dark:text-white text-xl font-mono resize-none p-4 whitespace-pre-wrap overflow-y-scroll">{{ $content }}</div>

        <div class="absolute bottom-0 right-0 pr-8 pb-4 bg-transparent">
            <button class="text-2xl bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-300 text-black dark:text-white hover:text-white dark:hover:text-black font-bold py-2 px-4 rounded-full opacity-50 hover:opacity-100" type="submit" name="cmd" value="fork">Fork</button>
            <button class="text-2xl bg-orange-500 hover:bg-orange-700 dark:hover:bg-orange-300 text-black dark:text-white hover:text-white dark:hover:text-black font-bold py-2 px-4 rounded-full opacity-50 hover:opacity-100" type="submit" name="cmd" value="new">New</button>
        </div>
    </form>

@endsection
