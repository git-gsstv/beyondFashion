<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'cliente_nome',
        'status',
        'forma_pagamento',
        'total',
    ];
    
    // Relacionamento: Um Pedido pertence a Um Funcionário.
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}