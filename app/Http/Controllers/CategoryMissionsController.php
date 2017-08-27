<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategoryMissionCreateRequest;
use App\Http\Requests\CategoryMissionUpdateRequest;
use App\Repositories\CategoryMissionRepository;
use App\Validators\CategoryMissionValidator;


class CategoryMissionsController extends Controller
{

    /**
     * @var CategoryMissionRepository
     */
    protected $repository;

    /**
     * @var CategoryMissionValidator
     */
    protected $validator;

    public function __construct(CategoryMissionRepository $repository, CategoryMissionValidator $validator)
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
        $categoryMissions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoryMissions,
            ]);
        }

        return view('categoryMissions.index', compact('categoryMissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryMissionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryMissionCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $categoryMission = $this->repository->create($request->all());

            $response = [
                'message' => 'CategoryMission created.',
                'data'    => $categoryMission->toArray(),
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
        $categoryMission = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoryMission,
            ]);
        }

        return view('categoryMissions.show', compact('categoryMission'));
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

        $categoryMission = $this->repository->find($id);

        return view('categoryMissions.edit', compact('categoryMission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryMissionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CategoryMissionUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $categoryMission = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CategoryMission updated.',
                'data'    => $categoryMission->toArray(),
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
                'message' => 'CategoryMission deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CategoryMission deleted.');
    }
}
