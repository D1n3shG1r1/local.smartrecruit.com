<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin_model extends Model
{
    use HasFactory;
    protected $table = "superadmin";
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}