<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    use HasFactory;
    public $incrementing = true;
    public $timestamps = false;
    protected $table = 'matrice';
    protected $fillable = ["id", "name", "row", "columns"];
}
