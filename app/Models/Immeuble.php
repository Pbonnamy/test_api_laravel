<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    use HasFactory,HasTimestamps;

    public $timestamps = true;
    
    protected $fillable = [
        'id',
        'name',
        'address',
        'code_im',
        'code_soc'
    ];
}
