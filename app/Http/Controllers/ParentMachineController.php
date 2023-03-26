<?php

namespace App\Http\Controllers;

use App\Models\ParentMachine;
use Illuminate\Http\Request;
use App\Models\Department;

class ParentMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parentmachines = ParentMachine::orderBy('created_at', 'desc')->get();

        // return view to index with data from parentmachines and departments
        return view('pages.admin.parent_machines.index', compact('parentmachines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();
        return view('pages.admin.parent_machines.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'parent_name'   =>  ['required', 'string'],
            'department_id' =>  ['required']
        ]);

        $parentmachine = ParentMachine::create([
            'parent_name'   =>  $request->get('parent_name'),
            'department_id' =>  $request->get('department_id')
        ]);

        // redirect to index and bring message success
        return redirect()->route('parentmachines.index')
            ->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(ParentMachine $parentMachine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParentMachine $parentmachine)
    {
        $departments = Department::get();

        // return view to edit with data from parentmachines and departments
        return view('dashboard.parent-machines.edit', compact('parentmachine', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParentMachine $parentmachine)
    {
        $this->validate($request, [
            'parent_name'   =>  ['required', 'string'],
            'department_id' =>  ['required']
        ]);

        $parentmachine->update([
            'parent_name'   =>  $request->get('parent_name'),
            'department_id' =>  $request->get('department_id')
        ]);

        // redirect to index and bring message success
        return redirect()->route('parentmachines.index')
            ->with('success', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParentMachine $parentmachine)
    {
        $parentmachine->delete();

        // redirect to index and bring message success
        return redirect()->route('parentmachines.index')
            ->with('success', 'Berhasil menghapus data');
    }
}