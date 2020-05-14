<?php

namespace App\Http\Controllers\API;

use App\Department;
use App\DepartmentSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentSection as SectionResource;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = DepartmentSection::latest()->with(['department', 'employees'])->get();
        return ['data' => $sections];
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
            'section_name' => 'required|string|unique:department_sections,section_name|min:3',
            'section_goal' => 'required|string',
            'department_id' => 'required',
            'reason_for_creation'  => 'string',
            'sectional_head' => 'unique:department_sections,sectional_head'
        ]);
        DepartmentSection::create([
            'section_name' => $request['section_name'],
            'section_goal' => $request['section_goal'],
            'department_id' => $request['department_id'],
            'reason_for_creation' => $request['reason_for_creation'],
            'sectional_head' => $request['sectional_head']
        ]);

        return ['message' => 'Your data was submitted successfully'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = DepartmentSection::with(['department', 'employees'])->find($id);
        return ['data' => $section ];
    }


    public function checkSectionHead($name){
        $sections = DepartmentSection::where('sectional_head', $name)->exists();
        if($sections) {
            return response()->json(['status' => 'true']);
            //return ['message' => 'This employee is a sectonal head'];
        }else{
            return response()->json(['status' => 'false']);
            //return ['message' => 'Employee is free, Remember to asign this Position to Employee to make it public'];

        }

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
        $section = DepartmentSection::find($id);
        $request->validate([
            'section_name' => 'required|string|min:3|unique:department_sections,section_name,'.$section->id,
            'section_goal' => 'required|string',
            'department_id' => 'required',
            'reason_for_creation'  => 'string',
            'sectional_head' => 'unique:department_sections,sectional_head'. $section->id
        ]);

        $section->update($request->all());
        return ['message' => 'data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = DepartmentSection::find($id);
        $section->delete();

        return [ 'message' => 'Department was deleted'];
    }
}
