@extends('admin.layouts.main')

@section('title') {{'Create'}} @endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Создать пользователя</h1>
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
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Логин">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Пароль">
                    @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Повторите пароль">
                    @error('password_confirmation')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <select name="role_id" class="form-control select2" style="width: 100%;">
                      <option selected="selected" disabled>Выберите роль</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ $role->id == old('role_id') ? 'selected' : '' }}
                            >{{ $role->name }}</option>
                      @endforeach
                    </select>
                    @error('role_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </div>
            </form>
          </div>
        </div>
    </section>

@endsection
