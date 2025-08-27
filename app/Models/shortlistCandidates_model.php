<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shortlistCandidates_model extends Model
{
    use HasFactory;
    protected $table = "shortlistCandidates";
    //protected $primaryKey = 'id';
    //public $incrementing = false;
    public $timestamps = false;
}
