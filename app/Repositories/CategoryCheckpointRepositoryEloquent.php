<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Category_CheckpointRepository;
use App\Entities\CategoryCheckpoint;
use App\Validators\CategoryCheckpointValidator;

/**
 * Class CategoryCheckpointRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoryCheckpointRepositoryEloquent extends BaseRepository implements CategoryCheckpointRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryCheckpoint::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CategoryCheckpointValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
