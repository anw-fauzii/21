<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())], 
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
            'telp' => ['required', 'min:3'],
            'nama_perusahaan' => ['required', 'min:3'],
            'bidang_usaha' => ['required', 'min:3'],
            'alamat' => ['required', 'min:3'],
            'jabatan' => ['required', 'min:3'],
        ];
    }
}
