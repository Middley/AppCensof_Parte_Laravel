<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public $table = "projects";

    protected $fillable = [        
        'name', 
        'fecha',
        'region',
        'provincia',
        'distrito',
        'user_id'
    ];
    
    public $timestamps = false;
}
