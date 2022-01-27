<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\Validator;
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required'],
            'date' => ['required', 'date'],
            'status_id' => ['required', 'int', 'exists:statuses,id'],
            'top_id' => ['required', 'int', 'exists:tops,id'],
            'image' => ['required', 'image'],
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

    /**
     * Получить сообщения об ошибках для определённых правил проверки.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'date.required' => 'Необходимо указать дату',
            'date.date'  => 'Неправильный формат даты',
        ];
    }
}
