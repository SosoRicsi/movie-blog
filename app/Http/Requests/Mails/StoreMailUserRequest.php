<?php

namespace App\Http\Requests\Mails;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('mail_user.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'domain_id' => [
                'required',
                'exists:mail_domains,id',
            ],
            'local_part' => [
                'required',
                'string',
                'max:64',
                'regex:/^[a-z0-9._+-]+$/i',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
            'user_id' => [
                'nullable',
                'exists:users,id'
            ]
        ];
    }
}
