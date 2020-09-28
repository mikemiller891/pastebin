@extends('layout.pastebin')

@section('content')

    <form class="h-full w-full overflow-hidden" action="/{{ $key }}" method="post">@csrf

        <x-paste readonly>{{ $content }}</x-paste>

        <div class="absolute bottom-0 right-0 pr-8 pb-4 bg-transparent">
            <x-button color="blue" value="fork">Fork</x-button>
            <x-button color="orange" value="new">New</x-button>
        </div>

    </form>

@endsection
