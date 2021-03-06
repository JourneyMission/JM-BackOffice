<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MissionCreateRequest;
use App\Http\Requests\MissionUpdateRequest;
use App\Repositories\MissionRepository;
use App\Repositories\MissionCheckpointRepository;
use App\Repositories\CategoryMissionRepository;
use App\Repositories\ProvienceRepository;
use App\Repositories\RegionRepository;
use App\Repositories\CheckpointRepository;

use App\Repositories\JoinMissionRepository;
use App\Validators\MissionValidator;


class MissionsController extends Controller
{

    /**
     * @var MissionRepository
     */
    protected $repository;
    protected $region;
    protected $provience;
    protected $categoryMission;
    protected $missionCheckpoint;
    protected $checkpoint;
    protected $JoinMissionRepository;

    /**
     * @var MissionValidator
     */
    protected $validator;

    public function __construct(MissionRepository $repository,CategoryMissionRepository $categoryMission,RegionRepository $region,JoinMissionRepository $JoinMissionRepository,ProvienceRepository $provience,MissionCheckpointRepository $missionCheckpoint,CheckpointRepository $checkpoint, MissionValidator $validator)
    {
        $this->repository = $repository;
        $this->region = $region;
        $this->provience = $provience;
        $this->missionCheckpoint = $missionCheckpoint;
        $this->checkpoint = $checkpoint;
        $this->categoryMission = $categoryMission;
        $this->JoinMissionRepository = $JoinMissionRepository;
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
        
        $missions = $this->repository->with(['categoryMission','MissionSource','MissionDestination','Region'])->all();

        if (request()->wantsJson()) {
            $missions = $this->repository->all();
            return response()->json([
                'data' => $missions,
            ]);
        }
        return view('missions.index', compact('missions'));
    }

    public function uploadIcon($request,$id){

        if($request->hasFile('Mission_Icon')){

            $extension = $request->Mission_Icon->extension();
            $filename = $id. "-" .substr( md5( $request->Mission_Name . '-' . time() ), 0, 15) . '.'.$extension; 
            $path = 'public/mission/icon';
            $request->file('Mission_Icon')->storeAs(
                $path, $filename
            );
            $mission = $this->repository->update(['Mission_Icon' => $filename], $id);
        }
    }

    public function uploadPhoto($request,$id){
        if($request->hasFile('Mission_Photo')){

            $extension = $request->Mission_Photo->extension();
            $filename = $id. "-" . substr( md5( $request->Mission_Name . '-' . time() ), 0, 15) . '.'.$extension; 
            $path = 'public/mission/photo';
            $request->file('Mission_Photo')->storeAs(
                $path, $filename
            );
            $request->merge(['Mission_Photo' => $filename]);
            $mission = $this->repository->update(['Mission_Photo' => $filename], $id);
        }
    }
    public function manageCheckpoint($Checkpoint_Name,$id,$Order){
        $checkpoint = $this->checkpoint->findWhere([
            'Checkpoint_Name'=> $Checkpoint_Name
        ])->first();
        $missionCheckpoint = $this->missionCheckpoint->findWhere([
            'Checkpoint_ID'=> $checkpoint->id,
            'Mission_ID'=> $id,
        ])->first();

        if ($missionCheckpoint != null) {
            $missionCheckpoint = $this->missionCheckpoint->update([
                'Mission_ID' => $id,
                'Checkpoint_ID'=> $checkpoint->id,
                'Order'=> $Order,
            ],$missionCheckpoint->id);
        }else{
            $missionCheckpoint = $this->missionCheckpoint->create([
                'Mission_ID' => $id,
                'Checkpoint_ID'=> $checkpoint->id,
                'Order'=> $Order,
            ]);
        }
    }

    public function CheckpointCheck($request){
        if($request->CheckpointCount!= 0){
            if (isset($request->MissionCheckpointOrder)) {
                $checkpoint = $this->checkpoint->findWhere([
                        'Checkpoint_Name'=> $request->MissionCheckpointOrder
                    ])->first();
                    if ($checkpoint == null) {
                        return false;
                    }
            }
            for ($i=2; $i <= $request->CheckpointCount; $i++) {
                $flag = "MissionCheckpointOrder".$i;
                if (isset($request->$flag)) {
                    $checkpoint = $this->checkpoint->findWhere([
                        'Checkpoint_Name'=> $request->$flag
                    ])->first();
                    if ($checkpoint == null) {
                        return false;
                    }
                }
            }
            return true;
        }
        return true;
        
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
            if ($request->Mission_Status == 'on') {
                $request->merge(['Mission_Status' => 1]);
            }else{
                $request->Mission_Status = 0;
            }

            if(MissionsController::CheckpointCheck($request)){

                $mission = $this->repository->create($request->all());

                if($request->hasFile('Mission_Icon')){
                    MissionsController::uploadIcon($request,$mission->id);
                }
                if($request->hasFile('Mission_Photo')){
                    MissionsController::uploadPhoto($request,$mission->id);
                }

                if ($request->CheckpointCount!= 0) {
                    if (isset($request->MissionCheckpointOrder)) {
                        MissionsController::manageCheckpoint($request->MissionCheckpointOrder,$mission->id,1);
                    }
                    for ($i=2; $i <= $request->CheckpointCount; $i++) {
                        $flag = "MissionCheckpointOrder".$i;

                        if (isset($request->$flag)) {
                            MissionsController::manageCheckpoint($request->$flag,$mission->id,$i);
                        }
                    }
                }


                $response = [
                    'message' => 'Mission created.',
                    'data'    => $mission->toArray(),
                ];

                if ($request->wantsJson()) {

                    return response()->json($response);
                }

                return redirect('/Missions')->with('message', $response['message']);
            }else{
                return redirect()->back()->with('message',"Checkpoint is Invalid Please Select from List")->withInput();
            }
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

        return redirect('/Missions');
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

        if ($id != 0) {
            $mission = $this->repository->with(['categoryMission','MissionSource','MissionDestination','Region','Checkpoint.Checkpoint','Checkpoint' => function ($query) {
                return $query->orderBy('Order','ASC');
            }])->find($id);
        }

        return view('missions.edit', compact('mission','proviences','categoryMission','regions'));
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
            if(MissionsController::CheckpointCheck($request)){
                if ($request->Mission_Status == 'on') {
                    $request->merge(['Mission_Status' => 1]);
                }else{
                    $request->Mission_Status = 0;
                }
                $mission = $this->repository->update($request->all(), $id);
                if($request->hasFile('Mission_Icon')){
                    MissionsController::uploadIcon($request,$id);
                }
                if($request->hasFile('Mission_Photo')){
                    MissionsController::uploadPhoto($request,$id);
                }
                if ($request->CheckpointCount!= 0) {
                    $this->missionCheckpoint->deleteWhere([
                        'Mission_ID' => $id
                    ]);
                    if (isset($request->MissionCheckpointOrder)) {
                        MissionsController::manageCheckpoint($request->MissionCheckpointOrder,$mission->id,1);
                    }
                    for ($i=2; $i <= $request->CheckpointCount; $i++) {
                        $flag = "MissionCheckpointOrder".$i;

                        if (isset($request->$flag)) {
                            MissionsController::manageCheckpoint($request->$flag,$mission->id,$i);
                        }
                    }
                }

                $response = [
                    'message' => 'Mission updated.',
                    'data'    => $mission->toArray(),
                ];

                if ($request->wantsJson()) {

                    return response()->json($response);
                }

                return redirect('/Missions')->with('message', $response['message']);
            }else{
                return redirect()->back()->withErrors("Checkpoint Name is Invalid Please Select from List")->withInput();
            }
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

    public function Proviences(){
     $source = $this->repository->scopeQuery(function($query){
        return $query->select('proviences.id','proviences.Provience_Name')->distinct()->join('proviences','Mission_Source','=','proviences.id')->orderBy('proviences.id');
    })->get();
     $destination = $this->repository->scopeQuery(function($query){
        return $query->select('proviences.id','proviences.provience_Name')->distinct()->join('proviences','Mission_Destination','=','proviences.id')->orderBy('proviences.id');
    })->get();
     if (request()->wantsJson()) {

        return response()->json([
            'source' => $source,
            'destination' => $destination,
        ]);
    }
}
public function RecommendMission($id){

    $join = $this->JoinMissionRepository->findByField('Profile_ID', $id);
    $join_missions = array();
    foreach ($join as $k => $v) {
        array_push($join_missions, $v["Mission_ID"]);
    }
    if (empty($join_missions)) {
        $missions = $this->repository->all();
    }else{
        $missions = $this->repository->scopeQuery(function($query){
            return $query->
            selectRaw('missions.*,(SELECT COUNT(join_missions.id) FROM join_missions WHERE join_missions.Mission_ID = missions.id  GROUP BY join_missions.Mission_ID)As COUNT')->
            where('missions.Mission_Status',1)->
            orderBy('count','DESC');
        })->findWhereNotIn('missions.id', $join_missions);
    }


    if (request()->wantsJson()) {

        return response()->json([
            'data' => $missions,
        ]);
    }
    return view('missions.index', compact('missions'));
}
}
