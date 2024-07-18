<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSaveAccRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'money' => 'required|numeric',
            'bank_id' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => "Meno banky nie je zadané.",
            'money.numeric' => "Suma k účtu je zle zadaná.",
            'money.required' => "Suma k účtu nie je zadaná.",
            'bank_id.required' => "Nemáš vybratú banku.",
        ];
    }
}
