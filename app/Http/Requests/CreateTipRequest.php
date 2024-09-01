<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => ['required', 'string'],
            'shown' => '',

        ];
    }

    public function messages()
    {
        return[
            'name.required' => "Titulok tipu nie je zadaný.",
            'description.required' => "Popis nie je vyplnený.",
        ];
    }
}
