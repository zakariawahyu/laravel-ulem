<?php

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title'         => 'required|max:255',
            'description'   => 'required',
            'date'          => 'required|date',
            'image'         => 'sometimes|required|image|mimes:jpg,jpeg,png',
            'image_caption' => 'required|max:255'
        ];
    }
}