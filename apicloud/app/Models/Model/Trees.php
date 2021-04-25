<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trees extends Model
{
    public $table = "trees";

    protected $fillable = [
        'id_project',
        'nombre_comun', 
        'nombre_cientifico', 
        'altura',
        'coor_este',
        'coor_norte',
        'observaciones',
        'fecha'
    ];
    
    public $timestamps = false;
}
