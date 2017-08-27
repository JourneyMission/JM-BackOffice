<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Checkin extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Checkin_ID',
		'Profile_ID',
		'Checkpoint_ID',
		'Checkin_Date',
	];

}
