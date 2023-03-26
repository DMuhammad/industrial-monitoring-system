<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentMachine;

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
        $machines = Machine::where('parent_id', $request->parent_id)->get();

        if (count($machines) > 0) {
            return response()->json($machines);
        }
    }

    public function getPartMachine(Request $request)
    {
        $partmachines = Machine::where('machine_id', $request->machine_id)->get();

        if (count($partmachines) > 0) {
            return response()->json($partmachines);
        }
    }
}
