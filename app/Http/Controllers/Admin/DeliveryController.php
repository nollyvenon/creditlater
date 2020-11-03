<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Payment;


class DeliveryController extends Controller
{
    public function index()
    {
        $delivery = Payment::all();
        if(count($delivery) == 0)
        {
            $delivery = null;
        }
        return view('admin.delivery', compact('delivery'));
    }
}
