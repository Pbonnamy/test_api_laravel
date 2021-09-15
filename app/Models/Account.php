<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory,HasTimestamps;

    protected $fillable = [
        'id',
        'user_id',
        'immeuble_id',
        'content',
    ];
}
