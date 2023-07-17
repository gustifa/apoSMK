<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot_pelanggaran extends Model
{
    use HasFactory;

    protected $table = 'bobot_pelanggaran';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
