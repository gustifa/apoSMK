<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Traits\Uuid;

class Jurusan extends Model
{
    use HasFactory;
    public $incrementing = true;
    protected $table = 'jurusan';
    protected $primaryKey = 'id';
    protected $guarded = [];

    
}
