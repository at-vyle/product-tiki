<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Order;
use Illuminate\Validation\ValidationException;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Response;
use App\Http\Requests\CreateOrderRequest;
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
    public function store(CreateOrderRequest $request)
    {
        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user->id
        ]);

        $total = 0;

        foreach ($request->products as $input) {
            $input['product_price'] = Product::find($input['id'])->price;
            $input['product_id'] = $input['id'];
            $input['order_id'] = $order->id;
            unset($input['id']);

            OrderDetail::create($input);
            $total += $input['product_price'] * $input['quantity'];
        }

        $order->fill(['total' => $total]);
        $order->load('orderDetails');

        return $this->showOne($order, Response::HTTP_OK);
    }
}
