<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "title"
    ];

    function packs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PackToCategory::class);
    }

    function companies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CompanyToCategory::class);
    }
}
