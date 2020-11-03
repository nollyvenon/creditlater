<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        // dd( (35 / 100) * 120000 );
        $payments = Payment::all();

        if(count($payments) == 0){
            $payments = null;
        }

        return view('admin.payment', compact('payments'));
    }
}
