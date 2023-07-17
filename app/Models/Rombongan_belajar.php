<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Rombongan_belajar extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'rombongan_belajar';
    protected $primaryKey = 'rombongan_belajar_id';
    protected $guarded = [];

    
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'jurusan_id');
    }
}
