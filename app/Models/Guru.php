<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Guru extends Model
{
    use HasFactory;
    use Uuid;
    protected $table = 'guru';
    protected $primaryKey = 'guru_id';
    protected $guarded = [];

    public function guru(){
		return $this->belongsTo(UserRfid::class, 'siswa_id', 'Nis');
	}
}
