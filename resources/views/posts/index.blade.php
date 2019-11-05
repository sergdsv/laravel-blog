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
                <div class="row post-detail">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <ul class="list-inline">
                        <li class="list-inline-item">
                            @if($post->user->avatar)
                                <img class="rounded-circle" src="{{ '/images/users/' . $post->user->avatar }}" style="width: 20px;"/>
                            @else
                                <img src="/images/user/no_user_avatar.png" style="width: 20px;"/>
                            @endif
                            <a href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar" aria-hidden="true"></i> <span>{{ $post->created_at }}</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-comment" aria-hidden="true"></i> <span class="text-info">Коментарии: {{ $post->comments->count() }}</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-share-square-o" aria-hidden="true"></i> <span class="text-info">Категория: <a href="{{ url('category/' . $post->category_id) }}">{{$post->category->title}}</a></span>
                        </li>
                        <!-- <li class="list-inline-item">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>Tags:</span>
                            <span class="badge badge-dark">bootstrap 4.0</span>
                            <span class="badge badge-success">laravel</span>
                            <span class="badge badge-danger">html</span>
                            <span class="badge badge-light">css</span>
                        </li> -->
                        </ul>
                    </div>
                </div>
        <hr>
    @endforeach
    </div>
    <div class="col-lg-3 col-sm-3 col-3">
        @include('posts.sidebar')
    </div>
</div>

@endsection
