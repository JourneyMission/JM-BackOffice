<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Checkpoint extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'Checkpoint_name',
		'Checkpoint_Latitude',
		'Checkpoint_Longtitude',
		'Checkpoint_LatitudeDelta',
		'Checkpoint_LongtitudeDelta',
		'Checkpoint_Description',
		'Checkpoint_Score',
		'Checkpoint_SpeacialScore',
		'Checkpoint_StartDate',
		'Checkpoint_EndDate',
		'Checkpoint_StartTime',
		'Checkpoint_EndTime',
		'Provience_ID',
		'Category_Checkpoint_ID',
	];

	

    public function CategoryCheckpoint() {
        return $this->belongsTo('App\Entities\CategoryCheckpoint','Category_Checkpoint_ID','id');
    }
    public function Provience() {
        return $this->belongsTo('App\Entities\Provience','Provience_ID','id');
    }
}
