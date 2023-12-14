<?php

namespace App\Http\Controllers\Api;

use App\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{ 


    //indes
       public function index()
       {
           $expense = Expense::all();
           return response()->json($expense);
       }
    
    
    //store
       public function store(Request $request)
       {
           $validatedData = $request->validate([
               'details' => 'required',
               'amount' => 'required'
              
               
              ]);
              $expense = new Expense;
              $expense->details = $request->details;
              $expense->amount = $request->amount;
              $expense->save(); 
       }
    
    
    //show
       public function show($id)
       {
           $expense = Expense::where('id',$id)->first();
           return response()->json($expense);
       }
    
    
    //update
       public function update(Request $request, $id)
       {
          $data=array();
          $data['details']=$request->details;
          $data['amount']=$request->amount;
         $data = Expense::where('id', $id)->update( $data);
        
       }
    
    
    // destroy
       public function destroy($id)
       {
    
         $expense =  Expense::where('id', $id)->first();
         Expense::where('id', $id)->delete();
    
       }
    
    
    }
    