<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProvienceCreateRequest;
use App\Http\Requests\ProvienceUpdateRequest;
use App\Repositories\ProvienceRepository;
use App\Validators\ProvienceValidator;


class ProviencesController extends Controller
{

    /**
     * @var ProvienceRepository
     */
    protected $repository;

    /**
     * @var ProvienceValidator
     */
    protected $validator;

    public function __construct(ProvienceRepository $repository, ProvienceValidator $validator)
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
        $proviences = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $proviences,
            ]);
        }

        return view('proviences.index', compact('proviences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProvienceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProvienceCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $provience = $this->repository->create($request->all());

            $response = [
                'message' => 'Provience created.',
                'data'    => $provience->toArray(),
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
        $provience = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $provience,
            ]);
        }

        return view('proviences.show', compact('provience'));
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

        $provience = $this->repository->find($id);

        return view('proviences.edit', compact('provience'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProvienceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProvienceUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $provience = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Provience updated.',
                'data'    => $provience->toArray(),
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
                'message' => 'Provience deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Provience deleted.');
    }
}
