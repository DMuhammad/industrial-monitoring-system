<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\PartMachine;
use Illuminate\Http\Request;

class PartMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partmachines = PartMachine::get();
        $machines = Machine::get();

        // return view to index with data from partmachines and machines
        return view('dashboard.part-machines.index', compact('partmachines', 'machines'));
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
            'part_name'             =>  ['required', 'string'],
            'standart_hourmeter'    =>  ['required', 'Integer'],
            'machine_id'            =>  ['required']
        ]);

        $partMachine = PartMachine::create([
            'part_name'             =>  $request->get('part_name'),
            'standart_hourmeter'    =>  $request->get('standart_hourmeter'),
            'machine_id'            =>  $request->get('machine_id')
        ]);

        // redirect to index and bring message success
        return redirect()->route('partmachine.index')
            ->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(PartMachine $partMachine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartMachine $partmachine)
    {
        $machines = Machine::get();

        // return view to edit with data from partmachine and machines
        return view('dashboard.part-machines.edit', compact('partmachine', 'machines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartMachine $partmachine)
    {
        $this->validate($request, [
            'part_name'             =>  ['required', 'string'],
            'standart_hourmeter'    =>  ['required', 'Integer'],
            'machine_id'            =>  ['required']
        ]);

        $partmachine->update([
            'part_name'             =>  $request->get('part_name'),
            'standart_hourmeter'    =>  $request->get('standart_hourmeter'),
            'machine_id'            =>  $request->get('machine_id')
        ]);

        // redirect to index and bring message success
        return redirect()->route('partmachine.index')
            ->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartMachine $partmachine)
    {
        $partmachine->delete();

        // redirect to index and bring message success
        return redirect()->route('partmachine.index')
            ->with('success', 'Berhasil menghapus data');
    }
}
