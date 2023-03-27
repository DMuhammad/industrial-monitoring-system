<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HourMeter extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id', 'parent_id', 'user_id', 'hourmeter', 'input_date'
    ];

    protected $hidden = [

    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function parentmachine()
    {
        return $this->belongsTo(ParentMachine::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}