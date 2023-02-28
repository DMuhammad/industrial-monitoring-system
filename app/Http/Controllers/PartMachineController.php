<?php

namespace App\Http\Controllers;

use App\Models\PartMachine;
use Illuminate\Http\Request;

class PartMachineController extends Controller
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
        $this->validate([
            'part_name'             =>  ['required', 'string'],
            'standart_hourmeter'    =>  ['required', 'Integer'],
            'machine_id'            =>  ['required']
        ]);

        $partMachine = PartMachine::create([
            'part_name'             =>  $request->get('part_name'),
            'standart_hourmeter'    =>  $request->get('standart_hourmeter'),
            'machine_id'            =>  $request->get('machine_id')
        ]);
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
    public function edit(PartMachine $partMachine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartMachine $partMachine)
    {
        $this->validate([
            'part_name'             =>  ['required', 'string'],
            'standart_hourmeter'    =>  ['required', 'Integer'],
            'machine_id'            =>  ['required']
        ]);
    
        $partMachine->update([
            'part_name'             =>  $request->get('part_name'),
            'standart_hourmeter'    =>  $request->get('standart_hourmeter'),
            'machine_id'            =>  $request->get('machine_id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartMachine $partMachine)
    {
        $partMachine->delete();
    }
}
