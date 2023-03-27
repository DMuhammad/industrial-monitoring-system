<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_name', 'parent_id'
    ];

    protected $hidden = [

    ];

    public function parentmachine()
    {
        return $this->belongsTo(ParentMachine::class, 'parent_id', 'id');
    }

    public function partmachines()
    {
        return $this->hasMany(PartMachine::class);
    }

    public function replacements()
    {
        return $this->hasMany(Replacement::class);
    }
}
