<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    public function getRankingByMovement($movementName)
    {
        $ranking = PersonalRecord::select(
        'movement.name as movement_name',
        'user.name as user_name',
        'personal_record.value as personal_record',
        'personal_record.date as record_date',
        DB::raw('RANK() OVER (ORDER BY personal_record.value DESC) as ranking_position')
    )
        ->join('user', 'user.id', '=', 'personal_record.user_id')
        ->join('movement', 'movement.id', '=', 'personal_record.movement_id')
        ->where('movement.name', $movementName)
        ->orderBy('personal_record.value', 'DESC')
        ->get();
        return $ranking;
    }

    public function getMovementRanking(Request $request)
    {
        $ranking = [];

        $movements = Movement::all();
        if($request->has('movementName')){
            $movements = [['name' => $request->movementName]];
        }

        foreach ($movements as $movement) {
            $ranking[] = $this->getRankingByMovement($movement['name']);
        }

        return $ranking;
    }
}
