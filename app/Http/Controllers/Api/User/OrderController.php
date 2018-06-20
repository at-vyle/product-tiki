<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Response;
use Auth;

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
        foreach (request('product') as $product) {
            OrderDetail::create([
                'product_id' => $product['id'],
                'order_id' => $order->id,
                'quantity' => $product['quantity'],
                'product_price' => $product['price']
            ]);
            $total = $product['price'] * $product['quantity'];
        }

        $order->fill(['total' => $total]);
        $order->load('orderDetails');

        return $this->showOne($order, Response::HTTP_OK);
    }
}
