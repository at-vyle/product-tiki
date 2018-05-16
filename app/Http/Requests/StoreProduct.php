<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'string',
            'price' => 'required|int|min:0',
            'quantity' => 'required|int|min:0',
            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
