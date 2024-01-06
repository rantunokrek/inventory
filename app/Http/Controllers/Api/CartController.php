<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addTocart(Request $request,$id){
        $product=DB::table('products')->where('id',$id)->first();
        $check = DB::table('pos')->where('pro_id', $id)->first();

        if ( $check) {
            DB::table('pos')->where('pro_id', $id)->increment('pro_quantity');

            $product = DB::table('pos')->where('pro_id', $id)->first();
            $subTotal = $product->pro_quantity * $product->product_price;

             DB::table('pos')->where('pro_id', $id)->update(['sub_total' => $subTotal]);
        }else{
            $data=array();
        $data['pro_id']=$id;
        $data['pro_name']=$product->product_name;
        $data['pro_quantity']=1;
        $data['product_price']=$product->selling_price;
        $data['sub_total']=$product->selling_price;
        DB::table('pos')->insert($data);
        return response('done');
        }

    }
   public function cartProduct(){
  
    $carts=DB::table('pos')->get();
         return response()->json($carts);

    }

    public function removeCart($id){
  
    DB::table('pos')->where('id', $id)->delete();
    return response('done');

    }

        public function cartIncrement($id){
           DB::table('pos')->where('id', $id)->increment('pro_quantity');
            $product = DB::table('pos')->where('id', $id)->first();
            $subTotal = $product->pro_quantity * $product->product_price;

           DB::table('pos')->where('id', $id)->update(['sub_total' => $subTotal]);
         return response('done');

    }
      public function cartDecrement($id){
            $productIncrement = DB::table('pos')->where('id', $id)->decrement('pro_quantity');
            $product = DB::table('pos')->where('id', $id)->first();
            $subTotal = $product->pro_quantity * $product->product_price;

         DB::table('pos')->where('id', $id)->update(['sub_total' => $subTotal]);
         return response('done');

    }


public function Vats(){
    $vat=DB::table('extras')->first();
    return response()->json($vat);
}



}
