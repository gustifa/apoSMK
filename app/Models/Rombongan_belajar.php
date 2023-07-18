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

    
    // public function jurusan(){
    //     return $this->belongsTo(Jurusan::class, 'jurusan_id', 'jurusan_id');
    // }

    public function peserta_didik(){
        return $this->belongsTo(Peserta_didik::class, 'peserta_didik_id', 'peserta_didik_id');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function walas(){
        return $this->belongsTo(Guru::class, 'guru_id', 'guru_id');
    }
}
