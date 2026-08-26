<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'item_code', 'name', 'stock', 'price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}