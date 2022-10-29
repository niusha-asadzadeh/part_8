<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function get(){
        return Product::all();
    }

    public function getById(string $id){
        return response()->json(
            Product::where('id',$id)->first()
        );
    }

    public function store(Request $request): JsonResponse
    {
        return  response()->json(
            Product::create(
                $request->validate([
                       'title'=>['required','string','min:2','max:100'],
                       'description'=>['required','string','nullable','min:2','max:100']
                   ])
            )
        );
    }

    public function deleteById(string $id): JsonResponse
    {
        Product::where('id',$id)->delete();
        return response()->json([
            'message'=>'product delete shod'
        ]);
    }

    public function updateById(Request $request ,string $id): JsonResponse
    {
        $product=Product::where('id',$id);
        $productValidation=$request->validate([
           'title'=>['string','min:2','max:100','nullable'],
           'description'=>['string','min:2','max:100','nullable'],
        ]);
        $product->update($productValidation);
        return response()->json([
           'message'=>'product update shod'
        ]);
    }
}
