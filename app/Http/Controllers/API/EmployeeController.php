<?php

namespace App\Http\Controllers\API;

use App\Employee;
use App\Http\Resources\Department;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->with(['department', 'departmentSection','position'])->get();
        if($employees){
            return response()->json(['data' => $employees]);
        }
    }

    public function employeesWithOutTitle(){
        $employees = Employee::where('is_sectional_head', '=', 0)->where('is_hod','=', 0)->get();
        return response()->json(['data' => $employees]);
    }
    public function getEmployee()
    {
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee =  Employee::find($id);
        return new EmployeeResource($employee);
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
        //
    }

    public function getEmployeeDept($id){
        $employees = Employee::where('department_id', $id)->get();
        if($employees){
            return response()->json(['data' => $employees]);
        }
    }

    public function disableEmployee(Request $request, $id){
        $employee = Employee::where('id', $id)->where('disable', 0)->limit(1);
            $employee->update([
                'disable' => $request['disable']
            ]);
        return response()->json($employee);
    }
    public function enableEmployee(Request $request, $id){
        $employeeEnable = Employee::where('id', $id)->where('disable', 1)->limit(1);
            $employeeEnable->update([
                'disable' => $request['enable']
            ]);
        return response()->json($employeeEnable);
    }

    public function updateDepartmentAndPosition(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->first();
        $employee->update([
            'department_id' => $request['department_id'],
            'department_section_id' => $request['department_section_id'],
            'position_id' => $request['position_id'],
        ]);
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function adminDelete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return [ 'message' => 'Employee was deleted by an Admin'];
    }
}
