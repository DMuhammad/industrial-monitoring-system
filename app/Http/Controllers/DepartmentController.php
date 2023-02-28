<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'department_name' => ['required', 'string']
        ]);

        $department = Department::create([
            'department_name' => $request->get('department_name')
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, [
            'department_name' => ['required', 'string']
        ]);
    
        $department->update([
            'department_name' => $request->get('department_name')
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
    }
}
