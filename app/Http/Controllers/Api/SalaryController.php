<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SalaryController extends Controller
{
   public function PaidSaraly(Request $request,$id){
    $validatedData = $request->validate([
        
        'salary_month' => 'required',
        
       ]);
      
      $month = $request->salary_month;
      $check = DB::table('salaries')->where('employee_id',$id)->where('salary_month',$month)->first();
      if ($check) {
       
      return response()->json('success', 'Salary already paided');
      
      }else{
         $data=array();
         $data['employee_id']=$id;
         $data['amount']=$request->salary;
         $data['salary_date']=date('d/m/Y');
         $data['salary_month']=$month;
         $data['salary_year']=date('Y');
         DB::table('salaries')->insert($data);

      }
     
   }
   public function allSalary(){
      $salary = DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();
      return response()->json($salary);
   }
  public function Salary_view($id){
      $month=$id;
      $view = DB::table('salaries')
      ->join('employees','salaries.employee_id','employees.id')
      ->select('employees.name','salaries.*')
      ->where('salaries.salary_month',$month)->get();
      return response()->json($view);
   }

    public function Salary_edit($id){
     
      $view = DB::table('salaries')
      ->join('employees','salaries.employee_id','employees.id')
      ->select('employees.name','employees.email','salaries.*')
      ->where('salaries.id',$id)->first();
      return response()->json($view);
   }
   public function Salary_update(Request $request,$id){
     
      $data=array();
      $data['employee_id']=$request->employee_id;
      $data['amount']=$request->amount;
      $data['salary_month']=$request->salary_month;
      DB::table('salaries')->where('id',$id)->update($data);

   }


   

   



}
