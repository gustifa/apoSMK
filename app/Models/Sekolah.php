<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GenUuid;

class Sekolah extends Model
{
    use HasFactory;
    use GenUuid;

    protected $table = 'sekolah';
    protected $primaryKey = 'sekolah_id';
    protected $guarded = [];
}
