<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cliente_nome', 
        'vendedor_id', 
        'status', 
        'forma_pagamento', 
        'total'
    ];

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'vendedor_id');
    }
}