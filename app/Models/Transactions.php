<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transactions extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function items(): BelongsTo
    {
        return $this->belongsTo(Items::class,'id_items','id');
        // return $this->belongsToMany(Hardware::class, 'hardware_pc', 'pc_id', 'hardware_id')->withPivot('keterangan');
    }
   
}
