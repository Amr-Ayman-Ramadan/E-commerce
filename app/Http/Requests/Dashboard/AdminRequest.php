<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $adminId = $this->route('admin') ? $this->route('admin')->id : null;
        return [
            "name" => ["required", "string", "max:255", "min:3"],
            "email" => [
                "required",
                "email",
                Rule::unique('admins', 'email')->ignore($adminId)
            ],
            "password" => [
                $this->isMethod('post') ? 'required' : 'nullable',
                "string",
                "min:8",
                "confirmed"
            ],
            "role_id" => ["required", "exists:roles,id"],
            "status" => ["required", "in:active,inactive"],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email address is already in use.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters.',
        ];
    }
}
