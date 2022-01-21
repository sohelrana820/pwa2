<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserUpdateRequest
 * @package App\Http\Requests
 */
class UserUpdateRequest extends FormRequest
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
        return [
            'first_name' => 'required|regex:/(^([a-zA-Z ]+)?$)/u|max:32',
            'last_name' => 'required|regex:/(^([a-zA-Z ]+)?$)/u|max:32',
            'email' => 'sometimes|required_unless:email,null|email',
            'mobile_number' => 'required|max:15',
            'password' => 'nullable|min:8',
            'confirm_password' => 'nullable|required_with:password|same:password|min:8',
        ];
    }
}
