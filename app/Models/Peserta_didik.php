<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GenUuid;

class Peserta_didik extends Model
{
    use HasFactory;
    use GenUuid;

    protected $table = 'peserta_didik';
    protected $primaryKey = 'peserta_didik_id';
    protected $guarded = [];
}
