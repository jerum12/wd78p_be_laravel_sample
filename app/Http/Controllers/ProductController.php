<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResource;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $products = Products::all();
            $response = [
                "code" => 200,
                "message" => "Successfully retrieved product list!",
                'products' => ProductsResource::collection($products)
            ];

        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error Retrieving product list!",
            ];
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $input = $request->all();
            $product = Products::create($input);
            $response = [
                "code" => 200,
                "message" => "Successfully created product list!",
                'product' => new ProductsResource($product)
            ];
        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error Retrieving product list!",
                "error" => $th->getMessage(),
            ];
        }
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $product = Products::findOrFail($id);
            $response = [
                "code" => 200,
                "message" => "Successfully retrieved product by id!",
                'product' => new ProductsResource($product)
            ];
        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error retrieving product by id!",
                "error" => $th->getMessage(),
            ];
         }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $input = $request->all();
            $product = Products::findOrFail($id);
            $product->update($input);
    
            $response = [
                "code" => 200,
                "message" => "Successfully update product by id!",
                'product' => new ProductsResource($product)
            ];
        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error updating product by id!",
                "error" => $th->getMessage(),
            ];
        }
    
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $product = Products::findOrFail($id);
            $product->delete();
            $response = [
                "code" => 200,
                "message" => "Successfully update deleted by id!",
                'product' => new ProductsResource($product)
            ];
        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error deleting product by id!",
                "error" => $th->getMessage(),
            ];
        }
   
        return $response;
    }
}
