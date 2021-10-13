<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Order;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;


class OrdersController extends Controller
{
    public function orders(Request $request)
    {
        $data = $request->all();

        $dateMin = ($data['minDate'] == '' ? new Carbon('2000/01/01') : (new Carbon($data['minDate']) ?? new Carbon('2000/01/01')));
        $dateMax = ($data['maxDate'] == '' ? new Carbon('2050/12/31') : (new Carbon($data['maxDate']) ?? new Carbon('2050/12/31')));
       

        // return $dateMax;

        $orders = Order::with("users",
        "priority",
        "orderProducts.product.productVendors.vendor")
        ->where(function ($query) use ($dateMin,$dateMax) {
            $query->where('delivery_date','>=',$dateMin)
            ->where('delivery_date','<=',$dateMax);
           })
        ->get();

        return $orders;
    }
}