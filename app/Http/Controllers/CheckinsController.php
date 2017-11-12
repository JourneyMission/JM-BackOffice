<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CheckinCreateRequest;
use App\Http\Requests\CheckinUpdateRequest;
use App\Repositories\CheckinRepository;
use App\Validators\CheckinValidator;
use App\Repositories\CheckpointRepository;
use App\Repositories\JoinMissionRepository;
use App\Repositories\MissionRepository;
use App\Repositories\ProfileRepository;


class CheckinsController extends Controller
{

    /**
     * @var CheckinRepository
     */
    protected $repository;
    protected $checkpoint;
    protected $profile;
    protected $mission;

    /**
     * @var CheckinValidator
     */
    protected $validator;

    public function __construct(CheckinRepository $repository,
        CheckpointRepository $checkpoint,
        ProfileRepository $profile,
        MissionRepository $mission,
        JoinMissionRepository $joinmission,
        CheckinValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->checkpoint = $checkpoint;
        $this->profile = $profile;
        $this->joinmission = $joinmission;
        $this->mission = $mission;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $checkins = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $checkins,
            ]);
        }

        return view('checkins.index', compact('checkins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CheckinCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CheckinCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $checkin = $this->repository->create($request->all());

            $response = [
                'message' => 'Checkin created.',
                'data'    => $checkin->toArray(),
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
        $checkin = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $checkin,
            ]);
        }

        return view('checkins.show', compact('checkin'));
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

        $checkin = $this->repository->find($id);

        return view('checkins.edit', compact('checkin'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CheckinUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CheckinUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $checkin = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Checkin updated.',
                'data'    => $checkin->toArray(),
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
                'message' => 'Checkin deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Checkin deleted.');
    }

    public function CheckMission($id,$pid){
        $checkins = $this->repository->findWhere(['Mission_ID'=>$id,'Profile_ID'=>$pid])->all();
        $returnme = array();
        foreach ($checkins as $k => $v) {
            array_push($returnme, $v["Checkpoint_ID"]);
        }
        sort($returnme);
        if (request()->wantsJson()) {
            return response()->json([
                'data' => $returnme,
            ]);
        }
        return $id;
    }

    public function Checkin($cid,$mid,$pid)
    {
        $checkpoint = $this->checkpoint->find($cid)->first();
        $mission = $this->mission->find($mid)->first();
        $profile = $this->profile->find($pid)->first();
        $joinmission = $this->joinmission->findWhere(['Mission_ID'=>$mid,'Profile_ID'=>$pid])->first();
        $score = $checkpoint['Checkpoint_Score'];
        $complete = '';
        if($joinmission){

        }

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $joinmission,
                'complete' => $complete,

            ]);
        }

        return view('checkins.show', compact('checkin'));
    }
}
