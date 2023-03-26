<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Machine;
use App\Models\ParentMachine;
use App\Models\PartMachine;
use App\Models\Replacement;
use Illuminate\Http\Request;

class ReplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $replacements = Replacement::get();

        // return view to index with data from replacements
        return view('pages.replacements.index', compact('replacements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $replacements = Replacement::get();

        // return view to index with data from replacements
        return view('pages.replacements.create', compact('replacements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
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

        // redirect to index and bring message success
        return redirect()->route('replacements.index')
            ->with('success', 'Berhasil menambahkan data');
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
        $departments = Department::get();

        // return view to edit with data from replacement, and departments
        return view('replacements.edit', compact('replacement', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Replacement $replacement)
    {
        $this->validate($request, [
            'department_id'         =>  ['required'],
            'parent_id'             =>  ['required'],
            'machine_id'            =>  ['required'],
            'part_id'               =>  ['required'],
            'replacement_hourmeter' =>  ['required', 'Integer']
        ]);

        $replacement->update([
            'department_id'         =>  $request->get('department_id'),
            'parent_id'             =>  $request->get('parent_id'),
            'machine_id'            =>  $request->get('machine_id'),
            'part_id'               =>  $request->get('part_id'),
            'replacement_hourmeter' =>  $request->get('replacement_hourmeter')
        ]);

        // redirect to index and bring message success
        return redirect()->route('replacements.index')
            ->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Replacement $replacement)
    {
        $replacement->delete();

        // redirect to index and bring message success
        return redirect()->route('replacements.index')
            ->with('success', 'Berhasil menghapus data');
    }
}
