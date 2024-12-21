<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CoupleRequest extends FormRequest
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

        $id = NULL;

        if($this->couple)
        {
            $id = $this->couple->id;
        }

        return [
            'couple_type'           => ['required', 'unique:couples,couple_type,'.$id, Rule::in(array_keys(config('custom.couple_type')))],
            'name'                  => 'required|max:255',
            'parent_description'    => 'required|max:255',
            'father_name'           => 'required|max:255',
            'mother_name'           => 'required|max:255',
            'image'                 => 'sometimes|required|image|mimes:jpg,jpeg,png',
            'image_caption'         => 'required|max:255',
            'instagram_url'         => 'required|max:255'
        ];
    }
}
