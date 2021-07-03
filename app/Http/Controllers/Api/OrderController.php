<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Dish;
use Braintree\Gateway;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{

  public function ordersShow($restaurant)
  {
    $orders = Order::where('restaurant_id',$restaurant)->orderBy('created_at','asc')->get();

    return response()->json([
        'response' => $orders,
        'success' => true,
    ]);
  }
}
