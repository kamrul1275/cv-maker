<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'discount', 'valid_until'];

    // Automatically cast valid_until to a DateTime object
    protected $casts = [
        'valid_until' => 'datetime',
    ];
}
