<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class GuestListRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug'      => Str::slug($this->name),
            'is_gift'   => filter_var($this->is_gift, FILTER_VALIDATE_BOOLEAN)
        ]);
    }

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

        if($this->id)
        {
            $id = $this->id;
        }

        return [
            'name'      => 'required|max:255',
            'slug'      => 'unique:guest_lists,slug,'.$id,
            'is_gift'   => 'required|boolean'
        ];
    }
}
