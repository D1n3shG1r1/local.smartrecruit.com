<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchasedCandidates_model extends Model
{
    use HasFactory;
    protected $table = "purchasedCandidates";
    //protected $primaryKey = 'id';
    //public $incrementing = false;
    public $timestamps = false;
}

