<div class="card">
    <div class="card-header">
      Категории
    </div>
    <div class="catd-body">
        <nav class="nav flex-column p-3">
            @foreach ($categories as $category)
                <li class="nav-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('category/' . $category->id) }}">{{ $category->title }}</a>
                    <span class="badge badge-info">{{ $category->posts->count() }}</span>
                </li>
            @endforeach
        </nav>
    </div>
  </div>
    <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Новые</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Популярные</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-1" id="one" role="tabpanel" aria-labelledby="one-tab">
            <ul class="list-group list-group-flush">
            @foreach ($new_posts as $post)
                <li class="list-group-item">
                    <div>
                    <span><a href="/posts/{{ $post->id }}"><small>{{ $post->title }}</small></a></span>
                    <span><small>{{ $post->created_at->format("m/d/Y") }}</small></span>
                    </div>
                </li>
            @endforeach
            </ul>
          </div>
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            @foreach ($postsTopLikesSort as $post)
            <div>
                <span><a href="/posts/{{ $post['postId'] }}"><small>{{ $post['postTitle'] }}</small></a></span>
            </div>
            @endforeach
          </div>

        </div>
    </div>
