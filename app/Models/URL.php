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
        'category_id',
        'path',
        'is_scraped',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, );
    }
}
