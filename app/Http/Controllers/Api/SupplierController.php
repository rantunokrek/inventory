<?php

namespace App\Http\Controllers\Api;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return response()->json($supplier);
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
            $upload_path='backend/supplier/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $supplier = new supplier;
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->shopname = $request->shopname;
            $supplier->file =  $image_url;
            $supplier->save();
     }else{
            $supplier = new supplier;
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->shopname = $request->shopname;
            $supplier->save();
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
        $supplier = Supplier::where('id',$id)->first();
        return response()->json($supplier);
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
       $data['shopname']=$request->shopname;
        $image = $request->newPhoto;
        if($image){
            $position = strpos($image, ';');
            $sub=substr($image, 0 ,$position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($image)->resize(240,200);
            $upload_path='backend/supplier/';
            $image_url=$upload_path.$name;
           $success = $img->save($image_url);
        if ($success) {
          $data['file']=$image_url;
          $img = Supplier::where('id', $id)->first();
          $image_path = $img->file;
          $done = unlink($image_path);
          $user = Supplier::where('id', $id)->update($data);
        }
        return response()->json('image');
           
     }else{
        $oldlogo = $request->file;
        $data['file']=$oldlogo;
        $user = Supplier::where('id', $id)->update($data);
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
      $supplier =  Supplier::where('id', $id)->first();
      $photo = $supplier->file;
    if ($photo) {
        unlink($photo);
        Supplier::where('id', $id)->delete();

    }else{
        Supplier::where('id', $id)->delete();

    }

    }
}
