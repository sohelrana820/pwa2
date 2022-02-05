<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
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
                /*'first_name' =>  'required|regex:/(^([a-zA-Z ]+)?$)/u|max:32',
                'last_name' =>  'required|regex:/(^([a-zA-Z ]+)?$)/u|max:32',*/
                'first_name' =>  'required|max:32',
                'last_name' =>  'required|max:32',
                'email' => 'required|unique:App\Models\User,email|email',
                'mobile_number' => 'required|max:15',
                'password' =>  'required|min:8',
                'confirm_password' => 'required:password|same:password',
            ];
    }
}
