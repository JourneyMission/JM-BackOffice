<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Profile_BadgeRepository;
use App\Entities\ProfileBadge;
use App\Validators\ProfileBadgeValidator;

/**
 * Class ProfileBadgeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProfileBadgeRepositoryEloquent extends BaseRepository implements ProfileBadgeRepository
{
     protected $fieldSearchable = [
        'id',
        'Profile_ID',
        'Badge_ID'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProfileBadge::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProfileBadgeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
