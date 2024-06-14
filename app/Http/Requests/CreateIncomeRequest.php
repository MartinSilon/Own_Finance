<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIncomeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'income' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'date' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => "Meno zdroja nie je zadané.",
            'income.required' => "Suma nie je vyplnená.",
            'income.regex' => "Suma je zadana v zlom tvare.",
            'date.numeric' => "Deň v mesiaci je v zlom tvare.",
        ];
    }
}
