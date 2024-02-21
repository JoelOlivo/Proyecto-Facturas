<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public $fillable = ['serie', 'status', 'id_cliente'];

    public function cliente () {
        
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
