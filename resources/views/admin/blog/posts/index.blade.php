@extends('adminlte::page')

@section('title', 'BLOG')

@section('content_header')
    <h1>Посты</h1>
@stop

@section('content')

<a href="{{url('admin/posts/create')}}" class="btn btn-app"><i class="fa fa-plus"></i>Добавить</a>




<div class="box">
            <div class="box-header">
              <h3 class="box-title">Все записи</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Заголовок</th>
                  <!-- <th>Текст</th> -->
                  <th>Дата создания</th>
                  <th>Категория</th>
                  <th>Коментарии</th>
                  <th>Пользователь</th>
                  <th>Лайки</th>
                  <th>Изображение</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <!-- <td>{{ $post->content }}</td> -->
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>{{ $post->comments->count() }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->likers()->count() }}</td>
                    <td class="text-center"><img style="height: 40px;" src="/images/{{ $post->image }}" alt=""></td>
                    <td>
                      <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default-show-{{$post->id}}">
                        <i class="glyphicon glyphicon-eye-open"></i>
                      </button>
                        <div class="modal fade" id="modal-default-show-{{$post->id}}" style="display: none;">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span></button>
                                  <h4 class="modal-title">{{ $post->title }}</h4>
                                </div>
                                <div class="modal-body">
                                  <img class="img-thumbnail" src="/images/{{ $post->image }}" alt="">
                                  <p>{{ $post->category->title }}</p>
                                  <p>{{ $post->created_at }}</p>
                                  <p>{{ $post->content }}</p>
                                  <div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                        <a href="{{url('admin/posts/' . $post->id . '/edit')}}" class="btn btn-default btn-sm">
                          <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <button type="submit" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default-delete-{{$post->id}}">
                          <i class="glyphicon glyphicon-remove"></i>
                        </button>
                        <div class="modal fade" id="modal-default-delete-{{$post->id}}" style="display: none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true"></span></button>
                                <h4 class="modal-title">Удаление</h4>
                              </div>
                              <div class="modal-body">
                                <p>Вы действительно хотите удалить запись?</p>
                              </div>
                              <div class="modal-footer">
                              <form action="{{ url('admin/posts', ['id' => $post->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                              </form>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@stop
