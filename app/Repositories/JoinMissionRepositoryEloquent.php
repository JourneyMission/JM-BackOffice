<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\JoinMissionRepository;
use App\Entities\JoinMission;
use App\Validators\JoinMissionValidator;

/**
 * Class JoinMissionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class JoinMissionRepositoryEloquent extends BaseRepository implements JoinMissionRepository
{
    protected $fieldSearchable = [
        'Profile_ID',
        'Mission_ID',
        'id',
        'Mission_Status'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JoinMission::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return JoinMissionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
