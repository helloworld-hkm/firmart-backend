<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Items extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function stocks(): HasMany
    {
        return $this->hasMany(Stocks::class);
    }
    public function transactions(): HasMany
    {
        return $this->hasMany(Transactions::class);
    }
}

