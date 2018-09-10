@extends('index')

@section('title', 'Все посты')

    @section('content')

        @foreach($post as $p)

            <div class="jumbotron">
                <h1><a href="{{ route('article.show', ['id'=>$p->id]) }}" >{{ $p->title }}</a></h1>
                <p>{{ $p->name }}</p>
                <p>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</p>
                <p class="lead">{{ $p->description }}</p>
                @if (Auth::guest())

                @else
                    @if(Auth::user()->name == $p->name)
                    <a href="{{ URL::to('article/'. $p->id . '/edit') }}" class="btn btn-default">Edit</a>
                    <p>
                        {!!Form::open(['method' => 'DELETE', 'route' => ['article.destroy', $p->id]]) !!}
                        {!!Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!!Form::close() !!}
                    </p>
                    @endif
                @endif
            </div>
        @endforeach
        {{ $post->links() }}
    @endsection

{{--<a href="{{ route('article.show', ['id'=>$p->id]) }}" >{{ $p->title }}</a>--}}