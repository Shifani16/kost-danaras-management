<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'occ_id', 
        'name', 
        'jml_tagihan', 
        'from_date', 
        'due_date', 
        'status', 
        'info'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'occ_id', 'occ_id');
    }
}
