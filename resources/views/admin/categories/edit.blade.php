@extends('admin.layouts.main')

@section('title') {{'Edit'}} @endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Редактировать категорию</h1>
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
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('patch')

                <div class="form-group">
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Наименование">
                    @error('name')
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
