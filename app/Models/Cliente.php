<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $fillable = ['numero_identidad', 'nombre', 'email'];

    public function factura () {

        return $this->hasMany(Factura::class);
    }
}
