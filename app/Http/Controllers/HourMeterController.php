<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\HourMeter;
use App\Models\ParentMachine;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HourMeterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hourmeters = HourMeter::get();

        // return view to index with data from hourmeters
        return view('pages.hour_meters.index', compact('hourmeters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();

        // return view create form with data departments
        return view('pages.hour_meters.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'department_id'     => ['required'],
            'parent_id'         => ['required'],
            'user_id'           => ['required'],
            'hourmeter'         => ['required', 'Integer'],
            'input_date'        => ['required', 'date']
        ]);

        $hourmeter = HourMeter::create([
            'department_id'     =>  $request->get('department_id'),
            'parent_id'         =>  $request->get('parent_id'),
            'user_id'           =>  $request->get('user_id'),
            'hourmeter'         =>  $request->get('hourmeter'),
            'input_date'        =>  $request->get('input_date')
        ]);

        // redirect to index and bring message success
        if ($hourmeter) {
            Alert::success('Berhasil', 'Berhasil menambahkan data');
            return redirect()->route('hourmeters.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HourMeter $hourmeter)
    {
        $departments = Department::get();
        $parentmachines = ParentMachine::where('department_id', $hourmeter->department_id)->get();

        // return view to edit with data from hourmeter, and departments
        return view('pages.hour_meters.edit', compact('hourmeter', 'departments', 'parentmachines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HourMeter $hourmeter)
    {
        $this->validate($request, [
            'department_id'     =>  ['required'],
            'parent_id'         =>  ['required'],
            'hourmeter'         =>  ['required', 'Integer'],
            'input_date'        => ['required', 'date']
        ]);

        $hourmeter->update([
            'department_id'     =>  $request->get('department_id'),
            'parent_id'         =>  $request->get('parent_id'),
            'hourmeter'         =>  $request->get('hourmeter'),
            'input_date'        =>  $request->get('input_date')
        ]);

        // redirect to index and bring message success

        if ($hourmeter) {
            Alert::success('Berhasil', 'Berhasil mengubah data');
            return redirect()->route('hourmeters.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HourMeter $hourmeter)
    {
        $hourmeter->delete();

        // redirect to index and bring message success
        return redirect()->route('hourmeters.index')
            ->with('success', 'Berhasil menghapus data');
    }
}