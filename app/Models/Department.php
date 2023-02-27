<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name'
    ];

    protected $hidden = [

    ];

    public function parentmachines()
    {
        return $this->hasMany(ParentMachine::class);
    }

    public function hourmeters()
    {
        return $this->hasMany(HourMeter::class);
    }

    public function replacements()
    {
        return $this->hasMany(Replacement::class);
    }
}
