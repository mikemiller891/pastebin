@extends('paste.layout')

@section('content')
    <form action="/" method="post">@csrf
        <div>
            <textarea name="content" cols="132" rows="25">{{ $content ?? '' }}</textarea>
        </div>
        <div>
            <button name="action" value="save">Save</button>
            <button name="action" value="cancel">Cancel</button>
        </div>
    </form>
@endsection
