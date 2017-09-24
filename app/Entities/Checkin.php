<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Checkin extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Profile_ID',
		'Checkpoint_ID',
		'Checkin_Date',
	];

	public function Checkpoint() {
        return $this->hasOne('App\Entities\Chekpoint','Checkpoint_ID','id');
    }
    public function Profile() {
        return $this->hasOne('App\Entities\Profile','Profile_ID','id');
    }

}
