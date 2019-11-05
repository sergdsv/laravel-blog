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
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
            @foreach ($new_posts as $post )
                <div>
                    <span><a href="/posts/{{ $post->id }}"><small>{{ $post->title }}</small></a></span>
                </div>
            @endforeach
          </div>
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            <h5 class="card-title">Tab Card Two</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>

        </div>
    </div>
