<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'title',
        'content',
        'category_id',
        'image',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
