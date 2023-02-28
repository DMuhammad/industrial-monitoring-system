<?php

namespace App\Http\Controllers;

use App\Models\ParentMachine;
use Illuminate\Http\Request;

class ParentMachineController extends Controller
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
        $this->validate([
            'parent_name'   =>  ['required', 'string'],
            'department_id' =>  ['required']
        ]);

        $parentMachine = ParentMachine::create([
            'parent_name'   =>  $request->get('parent_name'),
            'department_id' =>  $request->get('department_id')
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(ParentMachine $parentMachine)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParentMachine $parentMachine)
    {
        $this->validate([
            'parent_name'   =>  ['required', 'string'],
            'department_id' =>  ['required']
        ]);
    
        $parentMachine->update([
            'parent_name'   =>  $request->get('parent_name'),
            'department_id' =>  $request->get('department_id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParentMachine $parentMachine)
    {
        $parentMachine->delete();
    }
}
