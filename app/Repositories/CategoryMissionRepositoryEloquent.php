<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Category_MissionRepository;
use App\Entities\CategoryMission;
use App\Validators\CategoryMissionValidator;

/**
 * Class CategoryMissionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoryMissionRepositoryEloquent extends BaseRepository implements CategoryMissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryMission::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CategoryMissionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
