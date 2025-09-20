<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes_model extends Model
{
    use HasFactory;
    protected $table = "notes";
    protected $primaryKey = 'id';
    public $timestamps = false;
}

