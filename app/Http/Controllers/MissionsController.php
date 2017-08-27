<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MissionCreateRequest;
use App\Http\Requests\MissionUpdateRequest;
use App\Repositories\MissionRepository;
use App\Validators\MissionValidator;


class MissionsController extends Controller
{

    /**
     * @var MissionRepository
     */
    protected $repository;

    /**
     * @var MissionValidator
     */
    protected $validator;

    public function __construct(MissionRepository $repository, MissionValidator $validator)
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
        $missions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $missions,
            ]);
        }

        return view('missions.index', compact('missions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MissionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MissionCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $mission = $this->repository->create($request->all());

            $response = [
                'message' => 'Mission created.',
                'data'    => $mission->toArray(),
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
        $mission = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $mission,
            ]);
        }

        return view('missions.show', compact('mission'));
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
        if ($id == 0) {
            return view('missions.edit');
        }
        
        $mission = $this->repository->find($id);

        return view('missions.edit', compact('mission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MissionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MissionUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $mission = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Mission updated.',
                'data'    => $mission->toArray(),
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
                'message' => 'Mission deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Mission deleted.');
    }
}
