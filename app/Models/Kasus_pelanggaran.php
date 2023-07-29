<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus_pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'kasus_pelanggaran';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
