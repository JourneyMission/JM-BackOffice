<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Mission extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Mission_Name',
		'Mission_Description',
		'MissionCheckpointOrder',
		'Mission_Icon',
		'Mission_Score',
		'Mission_Photo',
		'Region_ID',
		'Category_Mission_ID',
		'Mission_Source',
		'Mission_Destination',
		'Mission_Status',
	];

}
