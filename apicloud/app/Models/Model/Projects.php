<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public $table = "projects";

    protected $fillable = [
        'fecha',
        'name', 
        'region',
        'provincia',
        'distrito'
    ];
    
    public $timestamps = false;
}
