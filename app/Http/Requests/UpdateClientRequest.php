<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('clients')->ignore($this->client),
            ],
            'contact_phone_number' => ['required'],
            'company_name' => ['required'],
            'company_address' => ['required'],
            'company_city' => ['required', 'string'],
            'company_zip' => ['required', 'integer'],
            'company_vat' => ['required', 'numeric'],
        ];
    }
}
