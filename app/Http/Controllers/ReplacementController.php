<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Machine;
use App\Models\ParentMachine;
use App\Models\PartMachine;
use App\Models\Replacement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $replacements = Replacement::orderBy('created_at', 'desc')->get();

        // return view to index with data from replacements
        return view('pages.replacements.index', compact('replacements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();

        // return view to index with data from departments
        return view('pages.replacements.create', compact('departments'));
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
            'replacement_hourmeter' =>  ['required', 'Integer'],
            'input_date'            =>  ['required', 'date']
        ]);

        $replacement = Replacement::create([
            'department_id'         =>  $request->get('department_id'),
            'parent_id'             =>  $request->get('parent_id'),
            'machine_id'            =>  $request->get('machine_id'),
            'part_id'               =>  $request->get('part_id'),
            'user_id'               =>  $request->get('user_id'),
            'replacement_hourmeter' =>  $request->get('replacement_hourmeter'),
            'input_date'            =>  $request->get('input_date')
        ]);

        if ($replacement) {
            // redirect to index and bring message success
            Alert::success('Berhasil', 'Berhasil menambahkan data');

            return redirect()->route('replacements.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Replacement $replacement)
    {
        $departments = Department::get();
        $parentmachines = ParentMachine::where('department_id', $replacement->department_id)->get();
        $machines = Machine::where('parent_id', $replacement->parent_id)->get();
        $partmachines = PartMachine::where('machine_id', $replacement->machine_id)->get();

        // return view to edit with data from replacement, departments, parentmachines, machines, and partmachines
        return view('pages.replacements.edit', compact('replacement', 'departments', 'parentmachines', 'machines', 'partmachines'));
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
            'replacement_hourmeter' =>  ['required', 'Integer'],
            'input_date'            =>  ['required', 'date']
        ]);

        $replacement->update([
            'department_id'         =>  $request->get('department_id'),
            'parent_id'             =>  $request->get('parent_id'),
            'machine_id'            =>  $request->get('machine_id'),
            'part_id'               =>  $request->get('part_id'),
            'replacement_hourmeter' =>  $request->get('replacement_hourmeter'),
            'input_date'            =>  $request->get('input_date')
        ]);

        if ($replacement) {
            // redirect to index and bring message success
            Alert::success('Berhasil', 'Berhasil mengubah data');

            return redirect()->route('replacements.index');
        }
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
