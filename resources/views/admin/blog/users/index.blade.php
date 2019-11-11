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
                  <th>Имя</th>
                  <th>e-mail</th>
                  <th>Изображение</th>
                  <th>Дата создания</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center"><img style="height: 40px;" src="/images/users/{{ $user->avatar }}" alt=""></td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{url('admin/posts/' . $user->id . '/edit')}}" class="btn btn-default btn-sm">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <button type="submit" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default-delete-{{$user->id}}">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                        <div class="modal fade" id="modal-default-delete-{{$user->id}}" style="display: none;">
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
                                <form action="{{ url('admin/users', ['id' => $user->id]) }}" method="post">
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
