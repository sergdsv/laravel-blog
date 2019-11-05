<div class="card">
    <div class="card-header">
      Категории
    </div>
    <div class="catd-body">
        <nav class="nav flex-column">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="nav-link" href="{{ url('category/' . $category->id) }}">{{ $category->title }}</a>
                    <span class="badge badge-primary badge-pill">{{ $category->posts->count() }}</span>
                </li>
            @endforeach
        </nav>
    </div>
  </div>
