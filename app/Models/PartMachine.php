<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartMachine extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_name', 'machine_id', 'standart_hourmeter'
    ];

    protected $hidden = [

    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function replacement()
    {
        return $this->hasOne(Replacement::class);
    }
}
