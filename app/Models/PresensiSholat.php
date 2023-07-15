<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GenUuid;

class PresensiSholat extends Model
{
    use HasFactory;
    use GenUuid;
    // protected $table = 'presensi_sholat';
    // protected $primaryKey = 'id';
    protected $guarded = [];

    public function presensiSholat(){
        return $this->belongsTo(userrfid::class, 'siswa_id', 'id');
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
}
