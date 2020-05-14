<?php

namespace App\Http\Controllers\API;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Department as DepartmentResource;
use App\Department;
use App\DepartmentSection;
use phpDocumentor\Reflection\Types\Integer;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with(['employees'])->latest()->get();
        return DepartmentResource::collection($departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|unique:departments,department_name|min:3',
            'department_rules' => 'required|string'
        ]);
        $department = new Department;
        $department->department_name = $request->department_name;
        $department->department_HOD = $request->department_HOD;
        $department->department_rules = $request->department_rules;
        $department->save();
        return response()->json([
            'success' => 'data was created'
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::with(['employees', 'sections'])->find($id);
        return new DepartmentResource($department);
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
        $department = Department::find($id);
        $request->validate([
            'department_name' => 'required|string|min:3|unique:departments,department_name,'.$department->id,

            'department_rules' => 'required'
        ]);
        $department->update( $request->all());
        return ['message' => 'Your data updated Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return [ 'message' => 'Department was deleted'];
    }

    public function getHod($id){
        $HOD = Employee::find($id);
        return response()->json(["data" => $HOD], 200);
    }


}
