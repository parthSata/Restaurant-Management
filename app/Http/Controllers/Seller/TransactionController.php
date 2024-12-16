<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
                $restaurants =  auth()->user()->restaurants;;

        return view('seller.transaction.transaction',compact('restaurants'));
    }
}
