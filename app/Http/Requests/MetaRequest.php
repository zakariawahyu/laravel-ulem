<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'         => 'required|min:30|max:65',
            'description'   => 'required|min:120|max:320',
            'keywords'      => 'required',
            'author'        => 'required',
            'image'         => 'sometimes|required|image|mimes:jpg,jpeg,png',
            'icon'          => 'sometimes|required|image|mimes:jpg,jpeg,png'
        ];
    }
}
