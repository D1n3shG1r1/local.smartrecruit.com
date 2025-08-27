<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_model extends Model
{
    use HasFactory;

    protected $table = "recruiterpackage";
    protected $primaryKey = 'userId';
    public $incrementing = false;
    public $timestamps = false;

    // Define the fillable properties to allow mass assignment
    protected $fillable = [
        'active',
        'expired',
        // Add other fields here that you want to be mass-assignable
    ];
}
