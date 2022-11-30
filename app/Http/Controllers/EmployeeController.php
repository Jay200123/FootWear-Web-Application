<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use View;
use Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return View::make('employee.index');
    }


     public function getEmployeeAll(Request $request)
    {
      
        $employees = Employee::orderBy('id', 'ASC')->get();
        return response()->json($employees);
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
         $employee = new Employee();

        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->address = $request->address;
        $employee->town = $request->town;
        $employee->city = $request->city;
        $employee->phone = $request->phone;

        $files = $request->file('uploads');

        $employee->employees_image = 'images/'. $files->getClientOriginalName();
        $employee->save();
        // $employee->update();


        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "employee created successfully.", "employee" => $employee, "status" => 200]);
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
        $employee = Employee::find($id);
        return response()->json($employee);
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
        $employee = Employee::find($id);

        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->address = $request->address;
        $employee->town = $request->town;
        $employee->city = $request->city;
        $employee->phone = $request->phone;

        $files = $request->file('uploads');

        $employee->employees_image = 'images/'. $files->getClientOriginalName();
        // $employee->update();
        $employee->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "employee updated successfully.", "employee" => $employee, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(["success" => "employee record deleted successfully", "employee" => $employee, "status" => 200]);
    }
}
