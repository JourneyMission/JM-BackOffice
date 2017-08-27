<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategoryCheckpointCreateRequest;
use App\Http\Requests\CategoryCheckpointUpdateRequest;
use App\Repositories\CategoryCheckpointRepository;
use App\Validators\CategoryCheckpointValidator;


class CategoryCheckpointsController extends Controller
{

    /**
     * @var CategoryCheckpointRepository
     */
    protected $repository;

    /**
     * @var CategoryCheckpointValidator
     */
    protected $validator;

    public function __construct(CategoryCheckpointRepository $repository, CategoryCheckpointValidator $validator)
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
        $categoryCheckpoints = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoryCheckpoints,
            ]);
        }

        return view('categoryCheckpoints.index', compact('categoryCheckpoints'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryCheckpointCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCheckpointCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $categoryCheckpoint = $this->repository->create($request->all());

            $response = [
                'message' => 'CategoryCheckpoint created.',
                'data'    => $categoryCheckpoint->toArray(),
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
        $categoryCheckpoint = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoryCheckpoint,
            ]);
        }

        return view('categoryCheckpoints.show', compact('categoryCheckpoint'));
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

        $categoryCheckpoint = $this->repository->find($id);

        return view('categoryCheckpoints.edit', compact('categoryCheckpoint'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryCheckpointUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CategoryCheckpointUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $categoryCheckpoint = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CategoryCheckpoint updated.',
                'data'    => $categoryCheckpoint->toArray(),
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
                'message' => 'CategoryCheckpoint deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CategoryCheckpoint deleted.');
    }
}
