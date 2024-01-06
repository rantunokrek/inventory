<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetProduct($id)
    {
        $product=DB::table('products')
        ->where('category_id',$id)
        ->get();
       return response()->json($product);
    } 



    public function order_Done(Request $request)
    {
    	 $validatedData = $request->validate([
           'customer_id' => 'required',
           'payby' => 'required',
         ]);

         $data=array();
         $data['customer_id']=$request->customer_id;
         $data['qty']=$request->qty;
         $data['sub_total']=$request->subtotal;
         $data['vat']=$request->vat;
         $data['total']=$request->total;
         $data['payby']=$request->payby;
         $data['pay']=$request->pay;
         $data['due']=$request->due;
         $data['order_date']=date('d/m/Y');
         $data['order_month']=date('F');
         $data['order_year']=date('Y');
         $order_id=DB::table('orders')->insertGetId($data);

         $contents=DB::table('pos')->get();

         $odata=array();
         foreach ($contents as $content) {
         	$odata['order_id']=$order_id;
         	$odata['product_id']=$content->pro_id;
         	$odata['pro_quantity']=$content->pro_quantity;
         	$odata['product_price']=$content->product_price;
         	$odata['sub_total']=$content->sub_total;
            DB::table('order_details')->insert($odata);	

            DB::table('products')
                 ->where('id',$content->pro_id)
                 ->update(['product_quality' => DB::raw('product_quality -' .$content->pro_quantity)]);

         }

         DB::table('pos')->delete();
         return response('done');

    }


    

    
    public function todaySell()
    {
       $date=date('d/m/Y');
       $sell=DB::table('orders')->where('order_date',$date)->sum('total');
       return response()->json( $sell);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todayIncome()
    {
        $date=date('d/m/Y');
       $income=DB::table('orders')->where('order_date',$date)->sum('pay');
       return response()->json( $income);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function todayDue()
    {
        $date=date('d/m/Y');
       $due=DB::table('orders')->where('order_date',$date)->sum('due');
       return response()->json( $due);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function todayExpense()
    {
        $date=date('d/m/Y');
        $amount=DB::table('expenses')->where('order_date',$date)->sum('amount');
        return response()->json( $amount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function StocksOut()
    {
       $getProduct = DB::table('products')->where('product_quality','<','1')->get();
        return response()->json($getProduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
