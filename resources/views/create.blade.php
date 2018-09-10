@extends('index')

@section('title', 'Добавить пост')


    @section('content')
        <div class="col-md-7">
            {!! Form::open(['route' => 'article.store']) !!}

                <div class="form-group">
                    <div class="col-md-3">
                        {{ Form::label('title', 'Title') }}
                    </div>
                    <div class="col-md-9">
                        {{ Form::text('title', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        {{ Form::label('description', 'Description') }}
                    </div>
                    <div class="col-md-9">
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <input type="hidden" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    @endsection