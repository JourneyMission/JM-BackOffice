<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\MissionRepository;
use App\Repositories\MissionCheckpointRepository;
use App\Repositories\CategoryMissionRepository;
use App\Repositories\CategoryCheckpointRepository;
use App\Repositories\ProvienceRepository;
use App\Repositories\RegionRepository;
use App\Repositories\CheckpointRepository;
use App\Repositories\BadgeRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\ProfileBadgeRepository;
use App\Repositories\CheckinRepository;
use App\Repositories\JoinMissionRepository;



class HomeController extends Controller
{

    public function __construct(
        MissionRepository $mission,
        CategoryMissionRepository $categoryMission,
        CategoryCheckpointRepository $categoryCheckpoint,
        RegionRepository $region,
        joinMissionRepository $joinMission,
        ProvienceRepository $provience,
        MissionCheckpointRepository $missionCheckpoint,
        CheckpointRepository $checkpoint,
        BadgeRepository $badge,
        ProfileRepository $profile,
        ProfileBadgeRepository $profileBadge,
        CheckinRepository $checkin
    ){
        $this->middleware('auth');
        $this->mission = $mission;
        $this->region = $region;
        $this->provience = $provience;
        $this->missionCheckpoint = $missionCheckpoint;
        $this->checkpoint = $checkpoint;
        $this->categoryMission = $categoryMission;
        $this->categoryCheckpoint = $categoryCheckpoint;
        $this->joinMission = $joinMission;
        $this->badge = $badge;
        $this->profile = $profile;
        $this->profileBadge = $profileBadge;
        $this->checkin = $checkin;
    }

    public function index()
    {
        $MissionCount = $this->mission->all()->count();
        $CheckpointCount = $this->checkpoint->all()->count();
        $BadgeCount = $this->badge->all()->count();
        $ProfileCount = $this->profile->all()->count();
        $JoinCount = $this->joinMission->all()->count();
        $CheckinCount = $this->checkin->all()->count();
        $ProfileBadgeCount = $this->profileBadge->all()->count();
        $FullScore = $this->profile->findWhere([['Profile_Score','!=',0]])->sum('Profile_Score');
        $fox = $this->profile->findWhere([['Profile_Score','!=',0],['Profile_Team','=','fox']])->sum('Profile_Score');
        $bear = $this->profile->findWhere([['Profile_Score','!=',0],['Profile_Team','=','bear']])->sum('Profile_Score');
        $MissionCategory = $this->categoryMission->scopeQuery(function($query){
            return $query->
            selectRaw('category_missions.Category_Mission_Name,(SELECT COUNT(missions.id) FROM missions WHERE missions.Category_Mission_ID = category_missions.id  GROUP BY category_missions.id)As COUNT');
        })->get();
        $CheckpointCategory = $this->categoryCheckpoint->scopeQuery(function($query){
            return $query->
            selectRaw('category_checkpoints.Category_Checkpoint_Name,(SELECT COUNT(checkpoints.id) FROM checkpoints WHERE checkpoints.Category_Checkpoint_ID = category_checkpoints.id  GROUP BY category_checkpoints.id)As COUNT');
        })->get();
        $JoinedMissionUser = $this->joinMission->scopeQuery(function($query){
            return $query->
            selectRaw('Date(created_at) AS DATE , COUNT(join_missions.id) AS COUNT')->whereRaw('join_missions.created_at >= NOW() + INTERVAL -7 DAY GROUP BY DATE(created_at)');
        })->all();
        $JoinedMissionCategory = $this->categoryMission->scopeQuery(function($query){
            return $query->
            selectRaw('category_missions.Category_Mission_Name AS DATE,(SELECT COUNT(join_missions.id) FROM join_missions join missions on join_missions.Mission_ID = missions.id WHERE missions.Category_Mission_ID = category_missions.id  GROUP BY category_missions.id)As COUNT');
        })->get();
        $CheckedinCheckpointCategory = $this->categoryCheckpoint->scopeQuery(function($query){
            return $query->
            selectRaw('category_checkpoints.Category_Checkpoint_Name AS DATE,(SELECT COUNT(checkins.id) FROM checkpoints join checkins on checkins.Checkpoint_ID = checkpoints.id WHERE checkpoints.Category_Checkpoint_ID = category_checkpoints.id  GROUP BY category_checkpoints.id)As COUNT');
        })->get();
        $GetBadge = $this->badge->scopeQuery(function($query){
            return $query->
            selectRaw('badges.Badge_Name AS DATE,(SELECT COUNT(profile_badges.id) FROM profile_badges WHERE badges.id = profile_badges.Badge_ID  GROUP BY badges.id)As COUNT');
        })->get();

        $data = [
            'MissionCount' => $MissionCount,
            'CheckpointCount' => $CheckpointCount,
            'BadgeCount' => $BadgeCount,
            'ProfileCount' => $ProfileCount,
            'JoinCount' => $JoinCount,
            'CheckinCount' => $CheckinCount,
            'ProfileBadgeCount' => $ProfileBadgeCount,
            'FullScore' => $FullScore,
            'fox' => $fox,
            'bear' => $bear,
            'MissionCategory' => $MissionCategory,
            'CheckpointCategory' => $CheckpointCategory,
            'JoinedMissionUser' => $JoinedMissionUser,
            'JoinedMissionCategory' => $JoinedMissionCategory,
            'CheckedinCheckpointCategory' => $CheckedinCheckpointCategory,
            'GetBadge' => $GetBadge,
        ];
        return view('home', compact('data'));
    }
}
