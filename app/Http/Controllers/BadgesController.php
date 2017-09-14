<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BadgeCreateRequest;
use App\Http\Requests\BadgeUpdateRequest;
use App\Repositories\BadgeRepository;
use App\Validators\BadgeValidator;
use App\Repositories\CategoryCheckpointRepository;
use App\Repositories\CategoryMissionRepository;
use App\Repositories\ProvienceRepository;
use App\Repositories\RegionRepository;

class BadgesController extends Controller
{

    /**
     * @var BadgeRepository
     */
    protected $repository;
    protected $region;
    protected $provience;
    protected $categoryMission;
    protected $categoryCheckpoint;

    /**
     * @var BadgeValidator
     */
    protected $validator;

    public function __construct(BadgeRepository $repository,CategoryMissionRepository $categoryMission,RegionRepository $region,ProvienceRepository $provience,CategoryCheckpointRepository $categoryCheckpoint, BadgeValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->categoryCheckpoint  = $categoryCheckpoint;
        $this->region = $region;
        $this->provience = $provience;
        $this->categoryMission = $categoryMission;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $badges = $this->repository->with(['categoryMission','Region','categoryCheckpoint','provience'])->all();
        $categoryMission = $this->categoryMission->all();
        $proviences = $this->provience->all();
        $regions = $this->region->all();
        $categoryCheckpoint = $this->categoryCheckpoint->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $badges,
            ]);
        }

        return view('badges.index', compact('badges','proviences','categoryMission','regions','categoryCheckpoint'));
    }

    public function uploadPhoto($request,$id){
        if($request->hasFile('Badge_Photo')){
                
                $extension = $request->Badge_Photo->extension();
                $filename = $id. "-" . substr( md5( $request->Badge_Name . '-' . time() ), 0, 15) . '.'.$extension; 
                $path = 'public/badge/';
                $request->file('Badge_Photo')->storeAs(
                    $path, $filename
                );
                $request->merge(['Badge_Photo' => $filename]);
                $mission = $this->repository->update(['Badge_Photo' => $filename], $id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BadgeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BadgeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            if ($request->Badge_Status == 'on') {
                $request->merge(['Badge_Status' => 1]);
            }else{
                $request->Badge_Status = 0;
            }

            if($request->hasFile('Badge_Photo')){
                $badge = $this->repository->create($request->all());
                BadgesController::uploadPhoto($request,$badge->id);
            }else{
            	return redirect()->back()->withErrors('Please Upload Photo')->withInput();
            }

            $response = [
                'message' => 'Badge created.',
                'data'    => $badge->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('/Badges')->with('message', $response['message']);
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
        

        if (request()->wantsJson()) {
        	$badge = $this->repository->find($id);
            return response()->json([
                'data' => $badge,
            ]);
        }

        return redirect('/Badges');
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
    	
        $categoryMission = $this->categoryMission->all();
        $proviences = $this->provience->all();
        $regions = $this->region->all();
        $categoryCheckpoint = $this->categoryCheckpoint->all();

        if ($id != 0 ) {
        	$badge = $this->repository->with(['categoryMission','Region','categoryCheckpoint','provience'])->find($id);
        }
        return view('badges.edit', compact('badge','proviences','categoryMission','regions','categoryCheckpoint'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BadgeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BadgeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            //dd($request->Badge_Status);
            if ($request->Badge_Status == 'on') {
                $request->merge(['Badge_Status' => 1]);
            }else{
                $request->Badge_Status = 0;
            }
            $badge = $this->repository->update($request->all(), $id);
            if($request->hasFile('Badge_Photo')){
                
                BadgesController::uploadPhoto($request,$id);
            }

            $response = [
                'message' => 'Badge updated.',
                'data'    => $badge->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('/Badges')->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->withErrors($e->getMessageBag())->withInput();
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
                'message' => 'Badge deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect('/Badges')->with('message', 'Badge deleted.');
    }
}
