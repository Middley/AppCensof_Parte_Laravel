<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trees extends Model
{
    public $table = "trees";

    protected $fillable = [
        'project_id',
        'nombre_comun', 
        'nombre_cientifico', 
        'altura',
        'coor_este',
        'coor_norte',
        'observaciones',
        'fecha'
    ];
    
    public $timestamps = false;


    public static function treess($id){
        return Trees::where('trees.project_id','=',$id);
    }
}
