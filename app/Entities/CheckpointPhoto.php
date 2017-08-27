<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CheckpointPhoto extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Checkpoint_Photo',
		'Checkpoint_ID',
	];

	public function Checkkpoint() {
        return $this->belongsTo('App\Entities\Chekpoint','Checkpoint_ID','id');
    }

}
