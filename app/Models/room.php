<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'room_id',
        'room_number',
        'room_type',
        'floor',
        'ac',
        'shelf',
        'bed',
        'bathroom',
        'capacity',
        'rent_charge',
        'occupiant',
    ];
}
