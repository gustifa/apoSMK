<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PresensiSholat extends Model
{
    use HasFactory;
    use Uuid;
    protected $table = 'presensi_sholat';
    // protected $primaryKey = 'id';
    protected $guarded = [];

    public function peserta_didik(){
        return $this->belongsTo(Peserta_didik::class, 'rfid_id', 'rfid_id', 'peserta_didik_id');
    }

    public function anggota_rombel(){
        return $this->belongsTo(anggota_rombel::class, 'peserta_didik_id', 'rfid_id');
    }
}
