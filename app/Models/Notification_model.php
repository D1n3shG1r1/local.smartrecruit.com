<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification_model extends Model
{
    use HasFactory;
    protected $table = "notifications";
    //protected $primaryKey = 'id';
    //public $incrementing = false;
    public $timestamps = false;
}

