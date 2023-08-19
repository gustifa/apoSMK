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
        return $this->belongsTo(Peserta_didik::class, 'rfid_id', 'rfid_id');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'Jurusan', 'id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'Kelas', 'id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'Group', 'id');
    }

    public function walas(){
        return $this->belongsTo(Guru::class, 'Walas_id', 'id');
    }

    public function rombel(){
        return $this->belongsTo(Rombel::class, 'Kelas', 'id');
    }

    public function anggota_rombel(){
        return $this->belongsTo(Anggota_rombel::class, 'rfid_id', 'peserta_didik_id');
    }
}
