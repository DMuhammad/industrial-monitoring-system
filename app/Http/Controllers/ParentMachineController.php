<?php

namespace App\Http\Controllers;

use App\Models\ParentMachine;
use Illuminate\Http\Request;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;

class ParentMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parentmachines = ParentMachine::orderBy('created_at', 'desc')->get();

        // return view to index with data from parentmachines
        return view('pages.admin.parent_machines.index', compact('parentmachines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();

        // return view create form with data from departments
        return view('pages.admin.parent_machines.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (is_null($request->get('department_id'))) {
            return back()->with('error', 'Data tidak lengkap');
        }

        $this->validate($request, [
            'parent_name'   =>  ['required', 'string'],
            'department_id' =>  ['required']
        ]);

        $parentmachine = ParentMachine::create([
            'parent_name'   =>  $request->get('parent_name'),
            'department_id' =>  $request->get('department_id')
        ]);

        if ($parentmachine) {
            // redirect to index and bring message success
            Alert::success('Berhasil', 'Berhasil menambahkan data');

            return redirect()->route('parentmachines.index');
        }
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
