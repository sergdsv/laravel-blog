@extends('adminlte::page')

@section('title', 'BLOG')

@section('content_header')
    <h1>Добавить категорию</h1>
@stop

@section('content')
<div class="h-100 d-flex justify-content-center align-items-center">

<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Добавить категорию</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" action="{{url('admin/categories')}}" enctype="multipart/form-data">
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
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Отправить</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>

@stop
