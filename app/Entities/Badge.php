<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Badge extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Badge_Name',
		'Badge_Description',
		'Badge_Photo',
		'Badge_Rank',
		'Badge_Status',
		'Badge_StartDate',
		'Badge_EndDate',
		'Badge_StartTime',
		'Badge_EndTime',
		'Badge_Required',
		'Badge_Category_Checkpoint',
		'Badge_Category_Checkpoint_Count',
		'Badge_Region_ID',
		'Badge_Region_Count',
		'Badge_Category_Mission',
		'Badge_Category_Mission_Count',
		'Badge_Provience_ID',
		'Badge_Provience_Count',
		'Badge_Provience_Check',
	];

}
