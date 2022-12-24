<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complains extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_type',
        'description',
        'status',
        'anonymous',
        'user_id',
        'handle_by',
        'assign_to',
        'attachment1',
    ];
}
