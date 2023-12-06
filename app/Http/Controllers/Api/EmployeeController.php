<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:employees|max:255',
            'email' => 'required',
            'phone' => 'required|unique:employees',
           ]);

           if($request->file){
            $position = strpos($request->file, ';');
            $sub=substr($request->file, 0 ,$position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->file)->resize(240,200);
            $upload_path='backend/employee/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joiningDate = $request->joiningDate;
            $employee->file =  $image_url;
            $employee->save();
     }else{
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joiningDate = $request->joiningDate;
            $employee->save();
     }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('id',$id)->first();
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       $data=array();
       $data['name']=$request->name;
       $data['email']=$request->email;
       $data['phone']=$request->phone;
       $data['address']=$request->address;
       $data['salary']=$request->salary;
       $data['nid']=$request->nid;
       $data['joiningDate']=$request->joiningDate;
        $image = $request->newPhoto;
        if($image){
            $position = strpos($image, ';');
            $sub=substr($image, 0 ,$position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($image)->resize(240,200);
            $upload_path='backend/employee/';
            $image_url=$upload_path.$name;
           $success = $img->save($image_url);
        if ($success) {
          $data['file']=$image_url;
          $img = Employee::where('id', $id)->first();
          $image_path = $img->file;
          $done = unlink($image_path);
          $user = Employee::where('id', $id)->update($data);
        }
        return response()->json('image');
           
     }else{
        $oldlogo = $request->file;
        $data['file']=$oldlogo;
        $user = Employee::where('id', $id)->update($data);
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employee =  Employee::where('id', $id)->first();
      $photo = $employee->file;
    if ($photo) {
        unlink($photo);
        Employee::where('id', $id)->delete();

    }else{
        Employee::where('id', $id)->delete();

    }

    }
}
