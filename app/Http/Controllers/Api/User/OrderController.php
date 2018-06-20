<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Order;
use Illuminate\Validation\ValidationException;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Response;
use Auth;
use Exception;
use Validator;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = config('define.order.limit_rows');
        $user = Auth::user();
        $orders = Order::with('user')->withCount('orderDetails')->where('user_id', $user->id)->paginate($perPage);
        $data = $this->formatPaginate($orders);
        return $this->showAll($data, Response::HTTP_OK);
    }

    /**
    * Create order
    *
    * @return \Illuminate\Http\Response
    */
    public function store()
    {
        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user->id
        ]);
        $total = 0;
        foreach (request('product') as $input) {
            $product = Product::find($input['id']);

            $validator = Validator::make($input, [
                'quantity' => 'numeric|max:'.$product->quantity
            ]);

            if ($validator->fails()) {
                $order->delete();
                throw new ValidationException($validator);
            }
            $input['price'] = $product->price;
            OrderDetail::create([
                'product_id' => $input['id'],
                'order_id' => $order->id,
                'quantity' => $input['quantity'],
                'product_price' => $input['price']
            ]);
            $total += $product['price'] * $product['quantity'];
        }

        $order->fill(['total' => $total]);
        $order->load('orderDetails');

        return $this->showOne($order, Response::HTTP_OK);
    }
}
