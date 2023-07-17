<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_pelajaran extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelajaran';
    protected $primaryKey = 'id';
    protected $guarded = [];

}
