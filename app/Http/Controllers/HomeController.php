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
        $departments = Department::count();
        $parentmachines = ParentMachine::count();
        $machines = Machine::count();
        $partmachines = PartMachine::count();
        $replacements = Replacement::get();

        return view('dashboard', compact('departments', 'parentmachines', 'machines', 'partmachines', 'replacements'));
    }
}
