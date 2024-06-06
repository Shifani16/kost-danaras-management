<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class occupant extends Model
{
    use HasFactory;

    protected $fillable = [
        'occ_id',
        'name',
        'date',
        'address',
        'email',
        'ph_number',
        'room'
    ];
}
