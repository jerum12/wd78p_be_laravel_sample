<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServicesResources;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $services = Services::orderBy('id','desc')->get();
            $response = [
                "code" => 200,
                "message" => "Successfully retrieved service list!",
                'services' => ServicesResources::collection($services)
            ];

        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error Retrieving service list!",
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
            $service = Services::create($input);
            $response = [
                "code" => 200,
                "message" => "Successfully created service list!",
                'service' => new ServicesResources($service)
            ];
        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error Retrieving service list!",
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
            $service = Services::findOrFail($id);
            $response = [
                "code" => 200,
                "message" => "Successfully retrieved service by id!",
                'service' => new ServicesResources($service)
            ];
        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error retrieving service by id!",
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
            $service = Services::findOrFail($id);
            $service->update($input);
    
            $response = [
                "code" => 200,
                "message" => "Successfully update service by id!",
                'service' => new ServicesResources($service)
            ];
        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error updating service by id!",
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
            $service = Services::findOrFail($id);
            $service->delete();
            $response = [
                "code" => 200,
                "message" => "Successfully update deleted by id!",
                'service' => new ServicesResources($service)
            ];
        } catch (\Throwable $th) {
            $response = [
                "code" => 500,
                "message" => "Error deleting service by id!",
                "error" => $th->getMessage(),
            ];
        }
   
        return $response;
    }
}
