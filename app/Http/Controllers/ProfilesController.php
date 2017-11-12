<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProfileCreateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\ProfileRepository;
use App\Repositories\CheckinRepository;
use App\Repositories\JoinMissionRepository;
use App\Validators\ProfileValidator;


class ProfilesController extends Controller
{

    /**
     * @var ProfileRepository
     */
    protected $repository;
    protected $CheckinRepository;
    protected $JoinMissionRepository;

    /**
     * @var ProfileValidator
     */
    protected $validator;

    public function __construct(ProfileRepository $repository, ProfileValidator $validator,JoinMissionRepository $JoinMissionRepository,CheckinRepository $CheckinRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->CheckinRepository = $CheckinRepository;
        $this->JoinMissionRepository = $JoinMissionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $profiles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $profiles,
            ]);
        }

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProfileCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $profile = $this->repository->create($request->all());

            $response = [
                'message' => 'Profile created.',
                'data'    => $profile->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = $this->repository->orderBy('Profile_Score','desc')->all();
        $mission = $this->JoinMissionRepository->findWhere(['Profile_id'=>$id,'Mission_Status'=>'0'])->count();
        $checkpoint = $this->CheckinRepository->findWhere(['Profile_id'=>$id])->count();
        $Myprofile = $this->repository->find($id);
        $rank = $this->repository->orderBy('Profile_Score','desc')
        ->findWhere([['Profile_Score', '>=', $Myprofile['Profile_Score']]])->count();
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $profile,
                'mission' => $mission,
                'checkpoint' => $checkpoint,
                'rank' => $rank
            ]);
        }

        return view('profiles.show', compact('profile'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $profile = $this->repository->find($id);

        return view('profiles.edit', compact('profile'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProfileUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProfileUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $profile = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Profile updated.',
                'data'    => $profile->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Profile deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Profile deleted.');
    }

    public function TeamScore()
    {

        $FullScore = $this->repository->findWhere([['Profile_Score','!=',0]])->sum('Profile_Score');
        $fox = $this->repository->findWhere([['Profile_Score','!=',0],['Profile_Team','=','fox']])->sum('Profile_Score');
        $bear = $this->repository->findWhere([['Profile_Score','!=',0],['Profile_Team','=','bear']])->sum('Profile_Score');
        if($FullScore != 0){

        $fox = ($fox / $FullScore);
        $bear = ($bear / $FullScore);
        $fox = floatval(number_format($fox, 2, '.', ''));
        $bear = floatval(number_format($bear, 2, '.', ''));

        }else{
            $bear = 0.5;
            $fox = 0.5;
        }
        if (request()->wantsJson()) {

            return response()->json([
                'fox' => $fox,
                'bear' => $bear,
            ]);
        }

        
    }
}
