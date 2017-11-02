<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MissionCheckpointRepository;
use App\Entities\MissionCheckpoint;
use App\Validators\MissionCheckpointValidator;

/**
 * Class MissionCheckpointRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MissionCheckpointRepositoryEloquent extends BaseRepository implements MissionCheckpointRepository
{
    protected $fieldSearchable = [
        'id',
        'Mission_ID',
        'Checkpoint_ID'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MissionCheckpoint::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MissionCheckpointValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
