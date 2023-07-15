<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GenUuid;

class Agama extends Model
{
    use HasFactory;
    use GenUuid;
    protected $table = 'agama';
	protected $primaryKey = 'id';
    protected $guarded = [];
}
