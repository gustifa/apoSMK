<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Peserta_didik extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'peserta_didik';
    protected $primaryKey = 'peserta_didik_id';
    protected $guarded = [];
}
