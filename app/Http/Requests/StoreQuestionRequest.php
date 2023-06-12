<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [
            'title' => 'required|unique:questions,title',
            'body' => 'required',
            'category_id' => 'required',
        ];

        switch($this->method()){
            case "PATCH":
            case "PUT": 
                $rule['title'] = 'required|min:5|unique:questions,title,'.$this->question->slug;
        }

        return $rule;
    }

    public function messages(){
        return [
            'category_id.required' => 'Category name is required!',
        ];
    }
}
