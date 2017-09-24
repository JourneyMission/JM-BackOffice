<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MissionCheckpoint extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Mission_ID',
        'Checkpoint_ID',
		'Order',
	];

	public function Checkpoint() {
        return $this->hasOne('App\Entities\Checkpoint','id','Checkpoint_ID');
    }
    public function Mission() {
        return $this->belongsTo('App\Entities\Mission','Mission_ID','id');
    }
}
