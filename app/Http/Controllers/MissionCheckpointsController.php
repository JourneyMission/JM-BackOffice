<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MissionCheckpointCreateRequest;
use App\Http\Requests\MissionCheckpointUpdateRequest;
use App\Repositories\MissionCheckpointRepository;
use App\Validators\MissionCheckpointValidator;


class MissionCheckpointsController extends Controller
{

    /**
     * @var MissionCheckpointRepository
     */
    protected $repository;

    /**
     * @var MissionCheckpointValidator
     */
    protected $validator;

    public function __construct(MissionCheckpointRepository $repository, MissionCheckpointValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $missionCheckpoints = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $missionCheckpoints,
            ]);
        }

        return view('missionCheckpoints.index', compact('missionCheckpoints'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MissionCheckpointCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MissionCheckpointCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $missionCheckpoint = $this->repository->create($request->all());

            $response = [
                'message' => 'MissionCheckpoint created.',
                'data'    => $missionCheckpoint->toArray(),
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
        $missionCheckpoint = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $missionCheckpoint,
            ]);
        }

        return view('missionCheckpoints.show', compact('missionCheckpoint'));
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

        $missionCheckpoint = $this->repository->find($id);

        return view('missionCheckpoints.edit', compact('missionCheckpoint'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MissionCheckpointUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MissionCheckpointUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $missionCheckpoint = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'MissionCheckpoint updated.',
                'data'    => $missionCheckpoint->toArray(),
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
                'message' => 'MissionCheckpoint deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MissionCheckpoint deleted.');
    }

    public function CheckMission($id){
        $checkins = $this->repository->findWhere(['Mission_ID'=>$id])->all();
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
}
