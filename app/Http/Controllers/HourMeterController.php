<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\HourMeter;
use App\Models\ParentMachine;
use Illuminate\Http\Request;

class HourMeterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hourmeters = HourMeter::get();

        // return view to index with data from hourmeters, departments, and parentmachines
        return view('pages.hour_meters.index', compact('hourmeters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();

        return view('pages.hour_meters.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'department_id'     =>  ['required'],
            'parent_id'         =>  ['required'],
            'user_id'           =>  ['required'],
            'input_date'        =>  ['required', 'date'],
            'hourmeter'    =>  ['required', 'Integer']
        ]);

        $hourmeter = HourMeter::create([
            'department_id'     =>  $request->get('department_id'),
            'parent_id'         =>  $request->get('parent_id'),
            'user_id'           =>  $request->get('user_id'),
            'input_date'        =>  $request->get('input_date'),

            'hourmeter'    =>  $request->get('hourmeter')
        ]);

        // redirect to index and bring message success
        return redirect()->route('hourmeters.index')
            ->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(HourMeter $hourMeter)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HourMeter $hourmeter)
    {
        $departments = Department::get();
        $parentmachines = ParentMachine::get();

        // return view to edit with data from hourmeter, departments, and parentmachines
        return view('hour-meters.edit', compact('hourmeter', 'departments', 'parentmachines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HourMeter $hourmeter)
    {
        $this->validate($request, [
            'department_id'     =>  ['required'],
            'parent_id'         =>  ['required'],
            'hourmeter'    =>  ['required', 'Integer']
        ]);

        $hourmeter->update([
            'department_id'     =>  $request->get('department_id'),
            'parent_id'         =>  $request->get('parent_id'),
            'hourmeter'    =>  $request->get('hourmeter')
        ]);

        // redirect to index and bring message success
        return redirect()->route('hourmeters.index')
            ->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HourMeter $hourMeter)
    {
        $hourMeter->delete();

        // redirect to index and bring message success
        return redirect()->route('hourmeters.index')
            ->with('success', 'Berhasil menambahkan data');
    }
}
