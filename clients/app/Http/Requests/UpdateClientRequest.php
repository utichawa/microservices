<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->parameter('id');

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:clients,email,' . $id . ',id',
            'login' => 'required|unique:clients,login,' . $id . ',id',
            'password' => 'required|min:5',
            'phone' => 'required|numeric|digits:8',
        ];
    }
}
