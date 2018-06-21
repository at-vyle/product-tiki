<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Order;
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
}
