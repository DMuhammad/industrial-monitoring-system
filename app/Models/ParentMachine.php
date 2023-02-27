<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentMachine extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_name', 'department_id'
    ];

    protected $hidden = [

    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function hourmeter()
    {
        return $this->hasOne(HourMeter::class);
    }

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }

    public function replacements()
    {
        return $this->hasMany(Replacement::class);
    }
}
