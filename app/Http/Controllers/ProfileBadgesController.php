<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProfileBadgeCreateRequest;
use App\Http\Requests\ProfileBadgeUpdateRequest;
use App\Repositories\ProfileBadgeRepository;
use App\Validators\ProfileBadgeValidator;


class ProfileBadgesController extends Controller
{

    /**
     * @var ProfileBadgeRepository
     */
    protected $repository;

    /**
     * @var ProfileBadgeValidator
     */
    protected $validator;

    public function __construct(ProfileBadgeRepository $repository, ProfileBadgeValidator $validator)
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
        $profileBadges = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $profileBadges,
            ]);
        }

        return view('profileBadges.index', compact('profileBadges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProfileBadgeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileBadgeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $profileBadge = $this->repository->create($request->all());

            $response = [
                'message' => 'ProfileBadge created.',
                'data'    => $profileBadge->toArray(),
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
        $profileBadge = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $profileBadge,
            ]);
        }

        return view('profileBadges.show', compact('profileBadge'));
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

        $profileBadge = $this->repository->find($id);

        return view('profileBadges.edit', compact('profileBadge'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProfileBadgeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProfileBadgeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $profileBadge = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProfileBadge updated.',
                'data'    => $profileBadge->toArray(),
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
                'message' => 'ProfileBadge deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProfileBadge deleted.');
    }
}
