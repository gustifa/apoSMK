<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait Uuid
{
	protected static function boot()
    {
		parent::boot();
        static::creating(function ($model) {
			if (!$model->getKey()){
				$model->setAttribute($model->getKeyName(), Str::uuid()->toString());
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
}