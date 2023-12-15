<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function Stock_update(Request $request, $id)
    {
       $data=array();
       $data['product_quality']=$request->product_quality;
        $user = Product::where('id', $id)->update($data);
     
    }
}
