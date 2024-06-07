<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Items extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    public function transactions(): HasMany
    {
        return $this->hasMany(Transactions::class);
    }
    public function types(): BelongsTo
    {
        return $this->belongsTo(Types::class,'id_types','id');
    }
}

