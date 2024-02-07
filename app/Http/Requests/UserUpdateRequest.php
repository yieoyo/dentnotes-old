<?php

namespace App\Http\Requests;

use App\Rules\UserStatusRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'role' => 'integer|between:1,3',
            'status' => [new UserStatusRule],
            'avatar'=> 'image|mimes:jpeg,png,jpg|max:1048'
        ];
    }
}