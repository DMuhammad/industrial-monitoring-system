<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\ParentMachine;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::orderBy('created_at', 'desc')->get();

        // return view to index with data from machines
        return view('pages.admin.machines.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentmachines = ParentMachine::get();

        // return view create form with data from machines and parentmachines
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

        if ($machine) {
            // redirect to index and bring message success
            Alert::success('Berhasil', 'Berhasil menambahkan data');

            return redirect()->route('machines.index');
        }
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
