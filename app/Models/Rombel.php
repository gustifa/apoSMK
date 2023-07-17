<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;
 //    protected $table = 'rombel';
	// protected $primaryKey = 'id';
    protected $guarded = [];

    public function walas(){
		return $this->belongsTo(Guru::class, 'guru_id', 'id');
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
}
