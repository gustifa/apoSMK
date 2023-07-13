<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRfid extends Model
{
    use HasFactory;
    protected $table = 'user';
	protected $primaryKey = 'id';
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

	public function walas(){
		return $this->belongsTo(Guru::class, 'Walas_id', 'id');
	}
}
