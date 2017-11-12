<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\JoinMissionCreateRequest;
use App\Http\Requests\JoinMissionUpdateRequest;
use App\Repositories\JoinMissionRepository;
use App\Validators\JoinMissionValidator;


class JoinMissionsController extends Controller
{

    /**
     * @var JoinMissionRepository
     */
    protected $repository;

    /**
     * @var JoinMissionValidator
     */
    protected $validator;

    public function __construct(JoinMissionRepository $repository, JoinMissionValidator $validator)
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
        $joinMissions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $joinMissions,
            ]);
        }

        return view('joinMissions.index', compact('joinMissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  JoinMissionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(JoinMissionCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $joinMission = $this->repository->create($request->all());

            $response = [
                'message' => 'JoinMission created.',
                'data'    => $joinMission->toArray(),
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
        $joinMission = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $joinMission,
            ]);
        }

        return view('joinMissions.show', compact('joinMission'));
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

        $joinMission = $this->repository->find($id);

        return view('joinMissions.edit', compact('joinMission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  JoinMissionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(JoinMissionUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $joinMission = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'JoinMission updated.',
                'data'    => $joinMission->toArray(),
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
                'message' => 'JoinMission deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'JoinMission deleted.');
    }

    public function complete($pid,$mid)
    {

        try {

            $mission = $this->repository->findWhere(['Profile_ID'=>$pid,'Mission_ID'=>$mid])->first();
            $id = $mission['id'];

            $joinMission = $this->repository->update(['Mission_Status'=>0], $id);

            $response = [
                'message' => 'JoinMission updated.',
                'data'    => $joinMission->toArray(),
            ];

            if (request()->wantsJson()) {

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
        }
    }
}
