<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LecturerUpdateRequest extends FormRequest
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
            'nidn' => [
                'required',
                'numeric',
                'digits:10',
                Rule::unique('lecturers')->ignore($this->nidn, 'nidn'),
            ],
            'firstname' => 'required|max:30',
            'last_name' => 'required|max:30',
            'department_id' => 'required'
        ];
    }
}
