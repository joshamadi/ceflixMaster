<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Model\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index(Order $order){
        return OrderResource::collection($order->latest()->get());
    }

    public function show(Order $order){
        if (empty($order))
            return response('Order not found', Response::HTTP_NOT_FOUND);
        else
        return new OrderResource($order);
    }

    public function update(Request $request, Order $order){
        if (empty($order))
            return response('Order not found', Response::HTTP_NOT_FOUND);
        else
        $order->update($request->all());
        return response('Order has been updated', Response::HTTP_OK);
    }
}
