@extends('layout')
@section('content')

<div class="container main-section border">

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-5">
                    <img src="/images/{{ $post->image }}" class="img-thumbnail" width="150px">
                    </div>
                    <div class="col-lg-10 col-sm-10 col-7">
                    <h4 class="text-primary"><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h4>
                    <p>{{ $post->content }}</p>  
                    <!-- <button class="btn btn-sm btn-dark">Read more</button> -->
                    </div>
                </div>
                <div class="row post-detail">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <ul class="list-inline">
                        <li class="list-inline-item">
                            <img src="https://dummyimage.com/20x20/a8a1a8/0f0f12" class="rounded-circle" width="20px"> <span>by</span> <span class="text-info">{{$post->user->name}}</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar" aria-hidden="true"></i> <span>{{ $post->created_at }}</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-comment" aria-hidden="true"></i> <span class="text-info">Коментарии: {{ $post->comments->count() }}</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-share-square-o" aria-hidden="true"></i> <span class="text-info">Категория: {{$post->category->title}}</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>Tags:</span>
                            <span class="badge badge-dark">bootstrap 4.0</span>
                            <span class="badge badge-success">laravel</span>
                            <span class="badge badge-danger">html</span>
                            <span class="badge badge-light">css</span>
                        </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            @comments(['model' => $post])
</div>

@endsection