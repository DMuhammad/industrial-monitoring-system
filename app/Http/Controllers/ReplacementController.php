<?php

namespace App\Http\Controllers;

use App\Models\Replacement;
use Illuminate\Http\Request;

class ReplacementController extends Controller
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
            'department_id'         =>  ['required'],
            'parent_id'             =>  ['required'],
            'machine_id'            =>  ['required'],
            'part_id'               =>  ['required'],
            'user_id'               =>  ['required'],
            'replacement_hourmeter' =>  ['required', 'Integer']
        ]);

        $replacement = Replacement::create([
            'department_id'         =>  $request->get('department_id'),
            'parent_id'             =>  $request->get('parent_id'),
            'machine_id'            =>  $request->get('machine_id'),
            'part_id'               =>  $request->get('part_id'),
            'user_id'               =>  $request->get('user_id'),
            'replacement_hourmeter' =>  $request->get('replacement_hourmeter')
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Replacement $replacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Replacement $replacement)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Replacement $replacement)
    {
        $this->validate([
            'department_id'         =>  ['required'],
            'parent_id'             =>  ['required'],
            'machine_id'            =>  ['required'],
            'part_id'               =>  ['required'],
            'user_id'               =>  ['required'],
            'replacement_hourmeter' =>  ['required', 'Integer']
        ]);
    
        $replacement->update([
            'department_id'         =>  $request->get('department_id'),
            'parent_id'             =>  $request->get('parent_id'),
            'machine_id'            =>  $request->get('machine_id'),
            'part_id'               =>  $request->get('part_id'),
            'user_id'               =>  $request->get('user_id'),
            'replacement_hourmeter' =>  $request->get('replacement_hourmeter')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Replacement $replacement)
    {
        $replacement->delete();
    }
}
