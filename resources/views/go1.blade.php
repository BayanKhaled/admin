@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach ($tags as $tag)
                        <h1>{{ $tag->name }}</h1>
                        <h5>The Posts: </h5>
                        <ul>
                            @foreach ($tag->posts as $post)
                                <li>The Post: {{ $post->title }}</li>
                                <li>The User: {{ $post->user->name }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
