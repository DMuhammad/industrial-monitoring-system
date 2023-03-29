<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id', 'parent_id', 'machine_id', 'part_id', 'user_id', 'replacement_hourmeter', 'input_date'
    ];

    protected $hidden = [];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function parentmachine()
    {
        return $this->belongsTo(ParentMachine::class, 'parent_id', 'id');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function partmachine()
    {
        return $this->belongsTo(PartMachine::class, 'part_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
