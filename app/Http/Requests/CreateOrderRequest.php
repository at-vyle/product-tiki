<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Order;
use App\Models\Product;

class CreateOrderRequest extends FormRequest
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
        $arr = [];
        $index = 0;
        foreach (request('products') as $input) {
            $product = Product::find($input['id']);
            $arr['products.'.$index.'.quantity'] = 'numeric|max:'.$product->quantity;
            $index++;
        }
        return $arr;
    }
}
