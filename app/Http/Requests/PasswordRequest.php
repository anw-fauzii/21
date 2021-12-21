<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required', 'min:8', new CurrentPasswordCheckRule],
            'password' => ['required', 'min:8', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['required', 'min:8'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'old_password' => __('current password'),
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Harap katasandi yang lama diisi terlebih dahulu.',
            'password.required' => 'Harap katasandi yang bari diisi.',
            'password_confirmation.required' => 'Harap konfirmasi katasandi diisi.',

            'old_password.min' => 'Katasandi minimal 8 karakter.',
            'password.min' => 'Katasandi minimal 8 karakter.',
            'password_confirmation.min' => 'Katasandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi katasandi tidak cocok',
            'password.different' => 'Katasandi baru tidak boleh sama dengan yang sebelumnya.',

        ];
    }
}
