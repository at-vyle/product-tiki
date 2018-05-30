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
        // try {
        //     $order = Order::findOrFail($id);
        //     $order->status = !$order->status;
        //     $order->save();
        //     $data['status'] = (int) $order->status;
        //     $data['msg'] = __('orders.admin.list.updated');
        // } catch {
        //     $order = Order::findOrFail($id);
        //     $order->status = !$order->status;
        //     $order->save();
        //     $data['status'] = (int) $order->status;
        //     $data['msg'] = __('orders.admin.list.updated');
        // } finally {
        //     return $data;
        // }
        // if ()
        $order->status = $request->status;
        $order->save();
        return response()->json(['order' => $order, 'msg' => __('orders.admin.list.updated')]);
    }
}
