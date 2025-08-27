<?php
//text keys
//subadminassets
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubadminAssets_model extends Model
{
    use HasFactory;
    protected $table = "subadminassets";
    protected $primaryKey = 'subadminId';
    public $incrementing = false;
    public $timestamps = false;
}
