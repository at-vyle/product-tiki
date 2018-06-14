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
        $user = Auth::user();
        
        $orders = Order::with('user')->withCount('orderDetails')->where('user_id', $user->id)->get();

        return $this->showAll($orders, Response::HTTP_OK);
    }
}
