<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request request
    * @param \App\Models\Order        $order   order to update
    *
    * @return \Illuminate\Http\Response
    */
    public function changeStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return response()->json(['order' => $order, 'msg' => __('orders.admin.list.updated')]);
    }
}
