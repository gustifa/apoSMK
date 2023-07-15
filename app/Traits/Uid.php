<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait GenUid
{
	protected static function boot()
    {
		parent::boot();
        static::creating(function ($model) {
			if (!$model->getKey()){
				$model->setAttribute($model->getKeyName() = $model->uid();
			}
		});
	}

	public function getIncremeting()
	{
		return false;
	}

	public function getKeyType()
	{
		return 'string';
	}

	public function uid($limit = 5)
	{
		return substr(base_convert(uniqid(mt_rand()), 16, 36), 0,  $limit);
	}
}