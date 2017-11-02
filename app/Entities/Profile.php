<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Profile extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Profile_ProviderID',
		'Profile_Name',
		'Profile_Email',
		'Profile_Team',
        'Profile_Score',
        'Profile_AccessToken',
	];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

}
