<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHomePageRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'status' => 'nullable',
            'make_view' => 'required|in:always,specific',
            'from_date' => 'required_if:make_view,specific|date|nullable',
            'to_date' => 'required_if:make_view,specific|date|nullable',
        ];
    }
}
