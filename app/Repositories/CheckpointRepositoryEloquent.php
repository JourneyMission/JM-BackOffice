<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CheckpointRepository;
use App\Entities\Checkpoint;
use App\Validators\CheckpointValidator;

/**
 * Class CheckpointRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CheckpointRepositoryEloquent extends BaseRepository implements CheckpointRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Checkpoint::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CheckpointValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
