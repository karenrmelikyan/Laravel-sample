<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    use HasFactory;

    private string $path;
    protected $table = 'urls';
    protected $fillable = [
        'path',
    ];
}
