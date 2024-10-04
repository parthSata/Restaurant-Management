<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponCodeController extends Controller
{
    public function index()
    {
        return view('seller.Couponcodes.Couponcodes');
    }
}
