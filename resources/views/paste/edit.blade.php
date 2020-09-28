@extends('layout.pastebin')

@section('content')

    <form class="h-full w-full overflow-hidden" action="/" method="post">@csrf

        <x-paste name="content" id="content" cols="80" rows="25" autofocus>{{ $content }}</x-paste>

        <div class="absolute bottom-0 right-0 pr-8 pb-4 bg-transparent">
            <x-button color="green" value="save">Save</x-button>
            <x-button color="red" value="cancel">Cancel</x-button>
        </div>

    </form>

@endsection
