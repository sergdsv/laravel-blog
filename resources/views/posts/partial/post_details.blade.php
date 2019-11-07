<div class="row post-detail">
        <div class="col-lg-12 col-sm-12 col-12">
            <ul class="list-inline">
            <li class="list-inline-item">

                <like-post :post_id="{{ $post->id }}" :user_id="{{ Auth::check() ? Auth::id() : 'false'  }}"></like-post>
            </li>
            <li class="list-inline-item">
                @if($post->user->avatar)
                    <img class="rounded-circle" src="{{ '/images/users/' . $post->user->avatar }}" style="width: 20px;"/>
                @else
                    <img src="/images/user/no_user_avatar.png" style="width: 20px;"/>
                @endif
                <a href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a>
            </li>
            <li class="list-inline-item">
                <i class="fa fa-calendar" aria-hidden="true"></i> <span>{{ $post->created_at->format("m/d/Y") }}</span>
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
