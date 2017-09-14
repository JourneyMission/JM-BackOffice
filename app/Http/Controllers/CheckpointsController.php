<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CheckpointCreateRequest;
use App\Http\Requests\CheckpointUpdateRequest;
use App\Repositories\CheckpointRepository;
use App\Repositories\CategoryCheckpointRepository;
use App\Repositories\CheckpointPhotoRepository;
use App\Repositories\ProvienceRepository;
use App\Validators\CheckpointValidator;

class CheckpointsController extends Controller
{

    /**
     * @var CheckpointRepository
     */
    protected $repository;

    protected $provience;

    protected $categoryCheckpoint;

    protected $checkpointPhoto;

    /**
     * @var CheckpointValidator
     */
    protected $validator;

    public function __construct(CheckpointRepository $repository,ProvienceRepository $provience,CategoryCheckpointRepository $categoryCheckpoint,CheckpointPhotoRepository $checkpointPhoto, CheckpointValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->provience  = $provience;
        $this->categoryCheckpoint  = $categoryCheckpoint;
        $this->checkpointPhoto  = $checkpointPhoto;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $checkpoints = $this->repository->with(['categoryCheckpoint','provience'])->all();

        if (request()->wantsJson()) {

            return response()->json($checkpoints);
        }

        return view('checkpoints.index', compact('checkpoints'));
    }

    public function uploadIMG(CheckpointCreateRequest $request,$id){
        if($request->hasFile('Checkpoint_Photo')){
                
                $extension = $request->Checkpoint_Photo->extension();
                
                $filename = substr( md5( $request->Checkpoint_Name . '-' . time() ), 0, 15) . '.'.$extension; 
                $path = 'public/checkpoint/';
                $request->file('Checkpoint_Photo')->storeAs(
                    $path, $filename
                );

                $checkpointPhoto = $this->checkpointPhoto->create(array('Checkpoint_Photo' => $filename,
                    'Checkpoint_ID'=> $id));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CheckpointCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CheckpointCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $checkpoint = $this->repository->create($request->all());
            
            CheckpointsController::uploadIMG($request,$checkpoint->id);

            $response = [
                'message' => 'Checkpoint created.',
                'data'    => $checkpoint->toArray(),
            ];
            return redirect('/Checkpoints')->with('message', $response['message']);
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
            $checkpoint = $this->repository->with('categoryCheckpoint')->with('provience')->find($id);
            return response()->json([
                'data' => $checkpoint,
            ]);
        }

        return view('checkpoints.show', compact('checkpoint'));
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
        $categoryCheckpoint = $this->categoryCheckpoint->all();
        $proviences = $this->provience->all();
        
        if ($id != 0 ) {
            $checkpoint = $this->repository->with(['categoryCheckpoint','provience','checkpointPhoto'])->find($id);
        }
        return view('checkpoints.edit', compact('checkpoint','categoryCheckpoint','proviences'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CheckpointUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CheckpointUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            
            $checkpoint = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Checkpoint updated.',
                'data'    => $checkpoint->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('/Checkpoints')->with('message', $response['message']);
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
                'message' => 'Checkpoint deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect('/Checkpoints')->with('message', 'Checkpoint deleted.');
    }
}
