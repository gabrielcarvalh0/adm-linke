<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitStore extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_id',
        'location'
    ];
}
