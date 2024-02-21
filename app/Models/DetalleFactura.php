<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    protected $fillable = ['id_producto', 'id_factura', 'precio', 'cantidad', 'precio_total'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }


    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id_factura');
    }


}
