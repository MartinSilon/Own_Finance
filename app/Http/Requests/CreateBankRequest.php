<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'money' => 'numeric',
            'goal'=>'',
            'user_id'=>'',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => "Meno banky nie je zadané.",
            'money.numeric' => "Suma je v zlom formáte.",
        ];
    }
}
