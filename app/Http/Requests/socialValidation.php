<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class socialValidation extends FormRequest
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
            'facebook'=> 'required|url',
            'twitter'=> 'required|url',
            'instagram'=> 'required|url',
            'youtube'=> 'required|url'
        ];
    }
    public function messages()
    {
         parent::messages(); // TODO: Change the autogenerated stub
        return [
            'facebook.required'=> 'Please enter a valid Facebook URL',
            'twitter.required'=> 'Please enter a valid Twitter URL',
            'instagram.required'=> 'Please enter a valid Instagram URL',
            'youtube.required'=> 'Please enter a valid Youtube URL'
            ];
    }
}
