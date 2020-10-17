@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach ($posts as $post)
                        <h1>{{ $post->title }}</h1>
                        <h4>The Post id: {{ $post->id }}</h4>
                        <h4>The User: {{ $post->user->name }}</h4>
                        <h5>The tags: </h5>
                        <ul>
                            @foreach ($post->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
