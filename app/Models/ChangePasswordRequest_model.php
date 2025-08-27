<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangePasswordRequest_model extends Model
{
    use HasFactory;
    protected $table = "changePasswordRequest";
    protected $primaryKey = 'token';
    public $incrementing = false;
    public $timestamps = false;
}
