<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRfidSiswa extends Model
{
    use HasFactory;
    protected $table = 'user_rfid';
    protected $guarded = [];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'Jurusan', 'id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'Kelas', 'id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'Group', 'id');
    }
}
