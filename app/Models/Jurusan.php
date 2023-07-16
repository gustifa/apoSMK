<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Traits\Uuid;

class Jurusan extends Model
{
    use HasFactory;
    // use Uuid;
    public $keyType = 'string';
    protected $table = 'jurusan';
    protected $incremeting = false;
    protected $primaryKey = 'jurusan_id';
    protected $guarded = [];

    
}
