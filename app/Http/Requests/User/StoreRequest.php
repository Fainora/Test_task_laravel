<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|max:100|min:6',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо заполнить',
            'name.min' => 'Логин должен быть больше 2 символа',
            'name.max' => 'Логин должен быть меньше 50 символов',
            'email.required' => 'Это поле необходимо заполнить',
            'email.unique' => 'Уже зарегистрирован пользователь с данным email',
            'email.email' => 'Введите email формата user@example.com',
            'password.required' => 'Это поле необходимо заполнить',
            'password.min' => 'Пароль должен быть больше 6 символов',
            'password.max' => 'Пароль должен быть меньше 100 символов',
            'role_id.required' => 'Выберите роль'
        ];
    }
}
