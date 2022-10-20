@extends('admin.layouts.main')

@section('title') {{'Edit'}} @endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Редактировать новость</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Главная</li>
              </ol>
            </div>
          </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('patch')

                <div class="form-group">
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control" placeholder="Наименование">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="body" value="{{ $post->body }}" class="form-control" placeholder="Описание">
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled>Выберите категорию</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $post->category_id ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Изменить">
                </div>

            </form>
          </div>
        </div>
    </section>

@endsection
