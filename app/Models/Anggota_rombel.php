<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Anggota_rombel extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'anggota_rombel';
    protected $primaryKey = 'anggota_rombel_id';
    protected $guarded = [];

    public function rombongan_belajar(){
        return $this->belongsTo(Rombongan_belajar::class, 'rombongan_belajar_id', 'rombongan_belajar_id');
    }

    public function peserta_didik(){
        return $this->belongsTo(Peserta_didik::class, 'peserta_didik_id', 'peserta_didik_id');
    }
}
