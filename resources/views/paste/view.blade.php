@extends('paste.layout')

@section('content')
    <form action="/{{ $key }}" method="post">@csrf
        <div>{{ $content }}</div>
        <div>
            <button name="action" value="fork">Fork</button>
            <button name="action" value="new">New</button>
        </div>
    </form>
@endsection
