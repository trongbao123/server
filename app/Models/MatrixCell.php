<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrixCell extends Model
{
    use HasFactory;
    public $incrementing = true;
    public $timestamps = false;
    protected $table = 'matrix_cells';
    protected $fillable = ["id", "matrix_id", "row_index", "column_index", "label", "attribute1", "attribute2"];
}
