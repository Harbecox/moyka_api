<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "count",
        "price",
    ];

    function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PackToCategory::class);
    }

    function companies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PackToCompany::class);
    }

    function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
