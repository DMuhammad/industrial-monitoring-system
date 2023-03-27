<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Machine;
use App\Models\ParentMachine;
use App\Models\PartMachine;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getParentMachine(Request $request)
    {
        $parentmachines = ParentMachine::where('department_id', $request->id)->get();

        if (count($parentmachines) > 0) {
            return response()->json($parentmachines);
        }
    }

    public function getMachine(Request $request)
    {
        $machines = Machine::where('parent_id', $request->id)->get();

        if (count($machines) > 0) {
            return response()->json($machines);
        }
    }

    public function getPartMachine(Request $request)
    {
        $partmachines = PartMachine::where('machine_id', $request->id)->get();

        if (count($partmachines) > 0) {
            return response()->json($partmachines);
        }
    }
}