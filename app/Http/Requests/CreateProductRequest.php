<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'product_name' => 'required|min:4',
            'price' => 'required',
            'description' => 'required|min:10',
            'volume' => 'required',
            'brands' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value <= 0) {
                        $fail('Brand must be selected.');
                    }
                }
            ],
            'types' => [
                'required',
                function ($attribute, $value, $fail) {
                    if($value <= 0) {
                        $fail('Type must be selected.');
                    }
                }
            ],
            'image' => 'required|file|mimes:jpg,bmp,png'
        ];
    }
}
