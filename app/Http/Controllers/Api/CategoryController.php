<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
 { 


//indes
   public function index()
   {
       $category = Category::all();
       return response()->json($category);
   }


//store
   public function store(Request $request)
   {
       $validatedData = $request->validate([
           'category_name' => 'required|unique:categories|max:255',
          
           
          ]);
          $category = new Category;
          $category->category_name = $request->category_name;
          $category->slugName = $request->slugName;
          $category->save(); 
   }


//show
   public function show($id)
   {
       $category = Category::where('id',$id)->first();
       return response()->json($category);
   }


//update
   public function update(Request $request, $id)
   {
      $data=array();
      $data['category_name']=$request->category_name;
      $data['slugName']=$request->slugName;
     $data = Category::where('id', $id)->update( $data);
    
   }


// destroy
   public function destroy($id)
   {

     $category =  Category::where('id', $id)->first();
     Category::where('id', $id)->delete();

   }


}
