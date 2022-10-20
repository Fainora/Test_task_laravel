@extends('admin.layouts.main')

@section('title') {{'Посты'}} @endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новости</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Главная</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Добавить</a>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 150px"></th>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Категория</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}"><i class="far fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                        <td>{{ $post->id }}</td>
                                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->name }}</a></td>
                                        <td>{{ $post->category->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

@endsection
