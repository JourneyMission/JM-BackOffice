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

	public function CategoryCheckpoint() {
        return $this->belongsTo('App\Entities\CategoryCheckpoint','Category_Checkpoint_ID','id');
    }
    public function Provience() {
        return $this->belongsTo('App\Entities\Provience','Provience_ID','id');
    }
    public function CategoryMission() {
        return $this->belongsTo('App\Entities\CategoryMission','Category_Mission_ID','id');
    }
    public function Region() {
        return $this->belongsTo('App\Entities\Region','Region_ID','id');
    }
}
