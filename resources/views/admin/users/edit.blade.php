@extends('admin.layouts.main')

@section('title') {{ $user->name }} @endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Редактировать пользователя</h1>
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
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('patch')

                <div class="form-group">
                    <input type="text" name="name" value="{{ $user->name ?? old('name') }}" class="form-control" placeholder="Имя">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <select name="role_id" class="form-control select2" style="width: 100%;">
                      <option selected="selected" disabled>Выберите роль</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ $role->id == $user->role_id ? 'selected' : '' }}
                            >{{ $role->name }}</option>
                      @endforeach
                    </select>
                    @error('role_id')
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
