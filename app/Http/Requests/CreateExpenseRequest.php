<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpenseRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'date' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => "Meno platby nie je zadané.",
            'price.required' => "Suma nie je vyplnená.",
            'price.regex' => "Suma je zadana v zlom tvare.",
            'date.numeric' => "Deň v mesiaci je v zlom tvare."
        ];
    }
}
