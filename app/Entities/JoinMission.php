<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class JoinMission extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Mission_ID',
		'Profile_ID',
		'Mission_Status',
	];

}
