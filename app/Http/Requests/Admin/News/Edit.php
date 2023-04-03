<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\News\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class Edit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function getCategoryIds(): array
    {
        return $this->validated('categories');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'categories' => ['required', 'array'],
            'categories.*' => ['integer', 'exists:categories,id'],
            'author' => ['nullable', 'string', 'min:2', 'max:100'],
            'status' => ['required', new Enum(StatusEnum::class)],
            'image' => ['nullable', 'image', 'mimes:jpg,bmp,png'],
            'description' => ['nullable', 'string'],
            'isVisible' => ['required']
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => '"Заголовок"',
            'categories' => '"Выбрать категории"',
            'author' => '"Автор"',
            'status' => '"Статус"',
            'description' => '"Текст"',
            'isVisible' => '"Отображение новости"'
        ];
    }
}
