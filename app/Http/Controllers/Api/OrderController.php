<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function todaysOrder(){
      $data=date('d/m/Y');
      $order=DB::table('orders')
      ->join('customers', 'orders.customer_id', 'customers.id')
      ->where('orders.order_date', $data)
      ->select('customers.customer_name', 'orders.*')
      ->orderBy('orders.id','DESC')->get();
      return response()->json($order);

    }

    public function OrderDetails($id)
    {
    	$orders=DB::table('orders')
    	        ->join('customers','orders.customer_id','customers.id')
    	        ->where('orders.id',$id)
    	        ->select('customers.customer_name','customers.customer_phone','customers.customer_address','orders.*')
    	        ->first();
    	  return response()->json($orders);               
    }
    public function OrderDetailsAll($id)
    {
    	$details=DB::table('order_details')
    	          ->join('products','order_details.product_id','products.id')
    	          ->where('order_details.order_id',$id)
    	          ->select('products.product_name','products.product_code','products.image','order_details.*')
    	          ->get();
    	  return response()->json($details); 
    }

    // search 
    public function searchByDate(Request $request){
     $orderDate = $request->date;
     return response()->json($orderDate);
    }

    public function searchByMonth(Request $request){
      $orderMonth = $request->month;
      return response()->json($orderMonth);
    }
    


}
