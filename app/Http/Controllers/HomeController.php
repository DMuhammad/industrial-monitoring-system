<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ParentMachine;
use App\Models\Machine;
use App\Models\PartMachine;
use App\Models\Replacement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $departments = Department::get();
        $parentmachines = ParentMachine::get();
        $machines = Machine::get();
        $partmachines = PartMachine::get();


        $replacements = Replacement::join('hour_meters', 'replacements.parent_id', '=', 'hour_meters.parent_id')
            ->select('replacements.*', 'hour_meters.hourmeter')
            ->where([
                ['hour_meters.input_date', '=', date('Y-m-d')]
            ])
            ->get();

        return view('dashboard', compact('departments', 'parentmachines', 'machines', 'partmachines', 'replacements'));
    }
}
