<?php

namespace App\Http\Requests\Dashboard;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role.en' => ["required","string","min:3",UniqueTranslationRule::for('roles')->ignore($this->id)],
            'role.ar' => 'required|string|min:3',
            'permissions' => 'required|array|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'role.en.required' => 'The English role name is required.',
            'role.en.string' => 'The English role name must be a string.',
            'role.en.min' => 'The English role name must be at least 3 characters.',
            'role.en.unique' => 'This English role name already exists.',
            'role.ar.required' => 'The Arabic role name is required.',
            'role.ar.string' => 'The Arabic role name must be a string.',
            'role.ar.min' => 'The Arabic role name must be at least 3 characters.',
            'role.ar.unique' => 'This Arabic role name already exists.',
            'permissions.required' => 'At least one permission is required.',
            'permissions.array' => 'Permissions must be provided as an array.',
            'permissions.min' => 'At least one permission is required.',
        ];
    }
}
