@extends('layout')
@section('content')

<div class="row">
    <div class="col-lg-9 col-sm-9 col-9">
    @foreach ($posts as $post)

                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-5">
                    <img src="/images/{{ $post->image }}" class="img-thumbnail" width="150px">
                    </div>
                    <div class="col-lg-10 col-sm-10 col-7">
                        <h4 class="text-primary"><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h4>
                        <p>{!! nl2br(e($post->content)) !!}</p>
                        <!-- <button class="btn btn-sm btn-dark">Read more</button> -->
                    </div>
                </div>
                @include('posts.partial.post_details')
        <hr>
    @endforeach
    </div>
    <div class="col-lg-3 col-sm-3 col-3">
        @include('posts.sidebar')
    </div>
</div>

@endsection
