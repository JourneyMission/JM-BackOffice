<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CheckpointPhotoCreateRequest;
use App\Http\Requests\CheckpointPhotoUpdateRequest;
use App\Repositories\CheckpointPhotoRepository;
use App\Validators\CheckpointPhotoValidator;


class CheckpointPhotosController extends Controller
{

    /**
     * @var CheckpointPhotoRepository
     */
    protected $repository;

    /**
     * @var CheckpointPhotoValidator
     */
    protected $validator;

    public function __construct(CheckpointPhotoRepository $repository, CheckpointPhotoValidator $validator)
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
        $checkpointPhotos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $checkpointPhotos,
            ]);
        }

        return view('checkpointPhotos.index', compact('checkpointPhotos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CheckpointPhotoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CheckpointPhotoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $checkpointPhoto = $this->repository->create($request->all());

            $response = [
                'message' => 'CheckpointPhoto created.',
                'data'    => $checkpointPhoto->toArray(),
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
        $checkpointPhoto = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $checkpointPhoto,
            ]);
        }

        return view('checkpointPhotos.show', compact('checkpointPhoto'));
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

        $checkpointPhoto = $this->repository->find($id);

        return view('checkpointPhotos.edit', compact('checkpointPhoto'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CheckpointPhotoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CheckpointPhotoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $checkpointPhoto = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CheckpointPhoto updated.',
                'data'    => $checkpointPhoto->toArray(),
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
                'message' => 'CheckpointPhoto deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CheckpointPhoto deleted.');
    }
}
