<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    use HasFactory; 
    // columns to be inserted or to be filled with 
    // make sure this columns are also matched within the migration table 
    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];
    
    
}
