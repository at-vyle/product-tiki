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
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $perPage = isset($request->perpage) ? $request->perpage : config('define.order.limit_rows');

        $orders = Order::with('user')->withCount('orderDetails')->where('user_id', $user->id)->paginate($perPage);
        $data = $this->formatPaginate($orders);
        return $this->showAll($data, Response::HTTP_OK);
    }

    /**
     * Display detail order.
     *
     * @param \App\Models\Order $order order to get detail
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $user = Auth::user();

        $orderDetail = Order::where('id', $order->id)->where('user_id', $user->id)->with('orderDetails.product.images')->first();

        $urlEnd = ends_with(config('app.url'), '/') ? '' : '/';
        $orderDetail['image_path'] = config('app.url') . $urlEnd . config('define.product.upload_image_url');
        $orderDetail['total_formated'] = number_format($orderDetail['total']);

        foreach ($orderDetail->orderDetails as $detail) {
            $detail['price_formated'] = number_format($detail['product_price']);
        }

        return $this->showOne($orderDetail, Response::HTTP_OK);
    }

    /**
    * Create order
    *
    * @param App\Http\Requests\CreateOrderRequest $request request
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
            unset($input['price']);
            OrderDetail::create($input);
            $total += $input['product_price'] * $input['quantity'];
        }

        $order->fill(['total' => $total]);
        $order->load('orderDetails');

        return $this->showOne($order, Response::HTTP_OK);
    }

    /**
    * Update order
    *
    * @param App\Http\Requests\CreateOrderRequest $request request
    * @param App\Models\Order                     $order   order to update
    *
    * @return \Illuminate\Http\Response
    */
    public function update(CreateOrderRequest $request, Order $order)
    {
        $user = Auth::user();

        $total = 0;

        foreach ($request->products as $input) {
            $input['product_id'] = $input['id'];
            $input['order_id'] = $order->id;
            $product = OrderDetail::where('order_id', $order->id)->where('product_id', $input['product_id'])->first();

            if ($product) {
                $product->quantity = $input['quantity'];
                $product->save();
            } else {
                $input['product_price'] = Product::find($input['id'])->price;
                unset($input['id']);
                unset($input['price']);
                OrderDetail::create($input);
            }


            $total += $input['product_price'] * $input['quantity'];
        }

        $order->fill(['total' => $total]);
        $order->load('orderDetails');

        return $this->showOne($order, Response::HTTP_OK);
    }
}
