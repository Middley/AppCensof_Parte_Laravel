<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $table = "products";

    protected $fillable = [
        'name', 
        'price', 
        'stock'
    ];
    
    public $timestamps = false;
}
//continuamos creando el controlador de products