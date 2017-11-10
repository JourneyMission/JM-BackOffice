<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CheckinRepository;
use App\Entities\Checkin;
use App\Validators\CheckinValidator;

/**
 * Class CheckinRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CheckinRepositoryEloquent extends BaseRepository implements CheckinRepository
{
    protected $fieldSearchable = [
        'id',
        'Checkpoint_ID',
        'Mission_ID',
        'Profile_ID',
        'Checkin_Date'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Checkin::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CheckinValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
