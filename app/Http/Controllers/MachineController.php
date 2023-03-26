<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\ParentMachine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::orderBy('created_at', 'desc')->get();

        // return view to index with data from machines and parentmachines
        return view('pages.admin.machines.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentmachines = ParentMachine::get();
        return view('pages.admin.machines.create', compact('parentmachines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'machine_name'  =>  ['required', 'string'],
            'parent_id'     =>  ['required']
        ]);

        $machine = Machine::create([
            'machine_name'  =>  $request->get('machine_name'),
            'parent_id'     =>  $request->get('parent_id')
        ]);

        // redirect to index and bring message success
        return redirect()->route('machines.index')
            ->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        $parentmachines = ParentMachine::get();

        // return view to edit with data from machine and parentmachines
        return view('dashboard.machines.edit', compact('machine', 'parentmachines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Machine $machine)
    {
        $this->validate($request, [
            'machine_name'  =>  ['required', 'string'],
            'parent_id'     =>  ['required']
        ]);

        $machine->update([
            'machine_name'  =>  $request->get('machine_name'),
            'parent_id'     =>  $request->get('parent_id')
        ]);

        // redirect to index and bring message success
        return redirect()->route('machines.index')
            ->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();

        // redirect to index and bring message success
        return redirect()->route('machines.index')
            ->with('success', 'Berhasil menghapus data');
    }
}
