<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MissionRepository;
use App\Entities\Mission;
use App\Validators\MissionValidator;

/**
 * Class MissionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MissionRepositoryEloquent extends BaseRepository implements MissionRepository
{
    protected $fieldSearchable = [
        'Mission_Name',
        'id',
        'Mission_Destination',
        'Mission_Source'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Mission::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MissionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
