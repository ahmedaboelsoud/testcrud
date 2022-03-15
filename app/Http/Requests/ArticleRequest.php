<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255|unique:articles',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $article = $this->route()->parameter('article');

            $rules = [
                'name' => 'required|unique:articles,name,' . $article->id
            ];


        }//end of if

        return $rules;
    }
}


// 'email' => 'required|email|unique:users,id,' . auth()->user()->id,
