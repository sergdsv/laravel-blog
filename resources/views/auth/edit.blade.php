@extends('layout')
@section('content')

{{ $errors }}
<div class="container">
    <form enctype="multipart/form-data" method="post" action="{{ route('users.update', $user) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="form-group">
                @if ($user->avatar)
                <img src="{{ '/images/users/' . $user->avatar }}" alt="">
                @endif
                <label for="name">Ваше фото</label>
                <input type="file" name="avatar" id="name" placeholder="Выберите изоражение">
        </div>

        <button type="submit" class="btn badge-danger">Send</button>
    </form>
</div>

@endsection
