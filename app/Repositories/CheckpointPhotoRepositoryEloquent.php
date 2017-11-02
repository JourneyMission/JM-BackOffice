<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Checkpoint_PhotoRepository;
use App\Entities\CheckpointPhoto;
use App\Validators\CheckpointPhotoValidator;

/**
 * Class CheckpointPhotoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CheckpointPhotoRepositoryEloquent extends BaseRepository implements CheckpointPhotoRepository
{
    protected $fieldSearchable = [
        'id',
        'Checkpoint_ID'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CheckpointPhoto::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CheckpointPhotoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
