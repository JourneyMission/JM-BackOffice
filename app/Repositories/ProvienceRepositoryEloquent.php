<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProvienceRepository;
use App\Entities\Provience;
use App\Validators\ProvienceValidator;

/**
 * Class ProvienceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProvienceRepositoryEloquent extends BaseRepository implements ProvienceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Provience::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProvienceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
