<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddItem extends FormRequest
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
        if($this->getMethod() == 'POST'){
            return [
                'title' => 'required',
                'desc' => 'string|min:3',
                'photo' => 'mimes:jpeg,bmp,png|max:1999'
            ];
        }else{
            return [];
        }
    }
}
