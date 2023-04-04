<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('created_at', 'desc')->get();

        // return view to index with data from departments
        return view(
            'pages.admin.departments.index',
            compact('departments'),
            ['title' => 'Department']
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view create form
        return view(
            'pages.admin.departments.create',
            ['title' => 'Add Department']
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'department_name' => ['required', 'string', 'unique:departments']
        ]);

        $department = Department::create([
            'department_name' => $request->get('department_name')
        ]);

        if ($department) {
            // redirect to index and bring message success

            alert()->success('Berhasil', 'Berhasil menambahkan data');

            return redirect()->route('departments.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        // return view to edit with data from hourmeter, and departments
        return view(
            'pages.admin.departments.edit',
            compact('department'),
            ['title' => 'Edit Department']
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, [
            'department_name' => ['required', 'string', 'unique:departments']
        ]);

        $department->update([
            'department_name' => $request->get('department_name')
        ]);

        if ($department) {
            // redirect to index and bring message success
            Alert::success('Berhasil', 'Berhasil mengubah data');

            return redirect()->route('departments.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        // redirect to index and bring message success
        return redirect()->route('departments.index')
            ->with('success', 'Berhasil menghapus data');
    }
}
