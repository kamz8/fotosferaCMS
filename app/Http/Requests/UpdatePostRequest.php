<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePostRequest extends Request
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
        dd($this->request->id);
        return [
            'title'=> "required|min:3|max:50|unique:posts,title,".$this->request->input('id'), 
            'content' => 'required',
            'tags' => 'max:225'
        ];
    }
}
