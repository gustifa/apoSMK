<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiSholat extends Model
{
    use HasFactory;
    protected $table = 'presensi_sholat';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
