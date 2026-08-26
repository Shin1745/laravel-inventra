<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Mengizinkan semua atribut diisi secara mass assignment
    protected $guarded = [];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}