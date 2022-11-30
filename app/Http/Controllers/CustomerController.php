<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use View;
use Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {
        return View::make('customer.index');
    
    }

     public function getCustomerAll(Request $request)
    {
        //if ($request->ajax()){
        $customers = Customer::orderBy('id', 'ASC')->get();
        return response()->json($customers);

        // return view('customer.index');
        //}
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
         $customer = new Customer();

        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->address = $request->address;
        $customer->town = $request->town;
        $customer->city = $request->city;
        $customer->phone = $request->phone;

        $files = $request->file('uploads');

        $customer->customer_image = 'images/'.  $files->getClientOriginalName();
        $customer->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "Customer created successfully.", "customer" => $customer, "status" => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
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
        $customer = Customer::find($id);

        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->address = $request->address;
        $customer->town = $request->town;
        $customer->city = $request->city;
        $customer->phone = $request->phone;

        $files = $request->file('uploads');

        $customer->customer_image = 'images/'. $files->getClientOriginalName();
        // $customer->update();
        $customer->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "Customer updated successfully.", "customer" => $customer, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json($customer);
    }
}
