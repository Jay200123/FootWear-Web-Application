<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use View;
use Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('service.index');
    }


    public function getService(){

        $services = Service::orderBy('id','ASC')->get();
        return response()->json($services);
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
        $service = new Service();

        $service->description = $request->description;
        $service->cost_price = $request->cost_price;
        $service->sell_price = $request->sell_price;

        $files = $request->file('uploads');

        $service->service_image = 'images/'.$files->getClientOriginalName();
        $service->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "service created successfully.", "service" => $service, "status" => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return response()->json($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $service = Service::find($id);
        $input = $request->all();

        // $service->brand = $request->brand;
        $service->description = $request->description;
        $service->cost_price = $request->cost_price;
        $service->sell_price = $request->sell_price;

        $files = $request->file('uploads');

        $service->service_image = 'images/'.$files->getClientOriginalName();
        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        
        // $product->update($input);
        $service->save($input);
        return response()->json(["success" => "service updated successfully.", "service" => $service, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        // return response()->json($service);
        return response()->json(["success" => "Service deleted successfully.", "service" => $service, "status" => 200]);
    }
}
