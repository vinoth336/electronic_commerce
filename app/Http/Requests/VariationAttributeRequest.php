<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariationAttributeRequest extends FormRequest
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
        $variationId = $this->variation->id ?? null;

        return [
            'name' => 'required|string',
            'slug_name' => "required|unique:variations,slug_name,{$variationId},id",
        ];
    }
}
