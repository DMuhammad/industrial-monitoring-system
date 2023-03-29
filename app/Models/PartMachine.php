<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartMachine extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_name', 'machine_id', 'standard_hourmeter'
    ];

    protected $hidden = [];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function replacement()
    {
        return $this->hasMany(Replacement::class);
    }
}
