<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MhmFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    

    public function rules()
    {
        $this->rules['name'] = ['required','string'];
        $this->rules['email'] = ['required','string','email','unique:users,email'];
        return $this->rules;
    }
}
