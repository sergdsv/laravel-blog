@extends('adminlte::page')

@section('title', 'BLOG')

@section('content_header')
    <h1>Добавить пост</h1>
@stop

@section('content')
<div class="h-100 d-flex justify-content-center align-items-center">

<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Добавить запись</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{url('admin/posts')}}" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
      
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                  <label for="title">Заголовок</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Заголовок">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                  <label for="category">Категория</label>
                  <add-category :categories="{{$categories}}"></add-category>
                    @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>
                
                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                  <label for="content">Текст</label>
                  <textarea type="text" name="content" class="form-control" id="content" rows="6">{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>
                <div class="form-group">
                  <label for="image">Выберите изображение</label>
                  <input type="file" id="image" name="image" value="{{ old('image') }}">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Отправить</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>

@stop
