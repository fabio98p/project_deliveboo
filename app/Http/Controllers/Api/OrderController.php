<?php

namespace App\Http\Controllers\Api;

use App\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{

  public function generate(Request $request, Gateway $gateway)
  {
    $token =$gateway->clientToken()->generate();
    $data = [
      'success' => true,
      'token' => $token,
    ];
    return response() -> json($data,200);
  }

  public function makePayment(Request $request, Gateway $gateway)
  {
    return 'make payment';
  }
}
