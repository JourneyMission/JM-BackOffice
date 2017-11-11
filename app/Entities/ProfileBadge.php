<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProfileBadge extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'id',
		'Badge_ID',
		'Profile_ID',
	];

}
