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


    public function Region() {
        return $this->belongsTo('App\Entities\Region','Region_ID','id');
    }

    public function MissionSource() {
        return $this->belongsTo('App\Entities\Provience','Mission_Source','id');
    }

    public function MissionDestination() {
        return $this->belongsTo('App\Entities\Provience','Mission_Destination','id');
    }

    public function CategoryMission() {
        return $this->belongsTo('App\Entities\CategoryMission','Category_Mission_ID','id');
    }

    public function Checkpoint(){
        return $this->hasMany('App\Entities\MissionCheckpoint','Mission_ID','id');
    }
}
