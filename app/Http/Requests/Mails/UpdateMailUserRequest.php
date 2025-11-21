<?php

namespace App\Http\Requests\Mails;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMailUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('mail_user.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'local_part' => [
                'sometimes',
                'string',
                'max:64',
                'regex:/^[a-z0-9._+-]+$/i',
            ],
            'password' => [
                Rule::requiredIf(fn ($input) => !$input->same_as_users),
                'nullable',
                'string',
                'min:8',
                'confirmed'
            ],
            'user_id' => [
                'required',
                'exists:users,id'
            ]
        ];
    }
}
