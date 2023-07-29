<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuSholat extends Model
{
    use HasFactory;

    protected $table = 'waktu_sholat';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
