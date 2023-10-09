<?php

namespace App\Http\Requests\InputForms\DataOrder;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'order' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '"Введите имя заказчика"',
            'phone' => '"Введите номер телефона"',
            'email' => '"Введите Email"',
            'order' => '"Введите Ваш запрос"',
        ];
    }
}
