@extends('layout.pastebin')

@section('content')

    <form class="h-full w-full overflow-hidden" action="/" method="post">@csrf
        <textarea
            class="h-full w-full bg-white dark:bg-black text-black dark:text-white text-xl font-mono resize-none p-4 overflow-y-scroll"
            name="content" id="content" cols="80" rows="25" autofocus>{{ $content }}</textarea>

        <div class="absolute bottom-0 right-0 pr-8 pb-4 bg-transparent">
            <button class="text-2xl bg-green-500 hover:bg-green-700 dark:hover:bg-green-300 text-black dark:text-white hover:text-white dark:hover:text-black font-bold py-2 px-4 rounded-full opacity-50 hover:opacity-100" type="submit" name="cmd" value="save">Save</button>
            <button class="text-2xl bg-red-500 hover:bg-red-700 dark:hover:bg-red-300 text-black dark:text-white hover:text-white dark:hover:text-black font-bold py-2 px-4 rounded-full opacity-50 hover:opacity-100" type="submit" name="cmd" value="cancel">Cancel</button>
        </div>
    </form>

@endsection
