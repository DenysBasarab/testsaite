@extends('index')

@section('title', 'Просмотр постов')


@section('content')

        <div class="jumbotron">
        <h1>{{ $post->title }}</h1>
        <p>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</p>
        <p>{{ $post->name }}</p>
        <p>{!! $post->description !!}</p>
    @if (Auth::guest())

    @else
        @if(Auth::user()->name == $post->name)
        <a href="{{ URL::to('article/'. $post->id . '/edit') }}" class="btn btn-default">Edit</a>
            <p>
                {!!Form::open(['method' => 'DELETE', 'route' => ['article.destroy', $post->id]]) !!}
                {!!Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!!Form::close() !!}
            </p>
        @endif
    @endif
    </div>

@endsection