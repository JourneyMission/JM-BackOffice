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
        'Mission_ID'
	];

	public function Checkpoint() {
        return $this->hasOne('App\Entities\Checkpoint','id','Checkpoint_ID');
    }
    public function Mission() {
        return $this->hasOne('App\Entities\Mission','id','Mission_ID');
    }
    public function Profile() {
        return $this->hasOne('App\Entities\Profile','Profile_ID','id');
    }

}
