<?php

namespace App\Http\Requests;

use App\Enums\StatusProject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'deadline_at' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'status' => ['required', Rule::enum(StatusProject::class)],
        ];
    }

    public function attributes(): array
    {
        return [
            'deadline_at' => 'deadline',
            'user_id' => 'user',
            'client_id' => 'client',
        ];
    }
}
