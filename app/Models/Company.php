<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "lat",
        "lng",
        "user_id",
        "qr"
    ];

    function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CompanyToCategory::class);
    }

    function getQrAttribute($value){
        return url($value);
    }
}
