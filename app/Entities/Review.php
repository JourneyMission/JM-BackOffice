<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Review extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Review_Content',
		'Review_Rate',
		'Profile_ID',
		'Checkpoint_ID'
	];

	public function Profile() {
        return $this->hasOne('App\Entities\Profile','id','Profile_ID');
    }

    public function Checkpoint() {
        return $this->hasOne('App\Entities\Checkpoint','id','Checkpoint_ID');
    }

}
