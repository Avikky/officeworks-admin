<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\PositionResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Position;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::orderBy('created_at', 'desc')->paginate(10);
        return PositionResource::collection($positions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:positions,name|min:3',
            'supposed_salary' => 'required',
            'job_description' => 'required',
        ]);
        Position::create([
            'name' => $request['name'],
            'supposed_salary' => $request['supposed_salary'],
            'job_description' => $request['job_description'],
        ]);

        return ['message' => 'Your data was submitted successfully'];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        return new PositionResource($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $position = Position::find($id);
        $request->validate([
            'name' => 'required|string|min:3|unique:positions,name,' . $position->id,
            'supposed_salary' => 'required',
            'job_description' => 'required | string',
        ]);

        $position->update($request->all());
        return ['message' => 'data updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::find($id);
        $position->delete();

        return ['message' => 'Department was deleted'];
    }

    public function updateEmployeePosition(Request $request, $id)
    {
        $position = Position::where('id', $id)->limit(1);

        $position->update([
            'employee_id' => $request->employee_id,
        ]);
        return response()->json(['message' => 'position updated successfully']);
    }
}

