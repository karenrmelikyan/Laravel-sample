<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class URL extends Model
{
    use HasFactory;

    private string $path;
    protected $table = 'urls';
    protected $fillable = [
        'user_id',
        'path',
        'scraped_status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, );
    }
}
