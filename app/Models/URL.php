<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class URL extends Model
{
    use HasFactory;

    private string $path;
    protected $table = 'urls';
    protected $fillable = [
        'user_id',
        'path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
