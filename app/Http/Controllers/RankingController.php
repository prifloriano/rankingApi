<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Http\Request;
use Carbon\Carbon; 

class RankingController extends Controller
{
    public function getRanking($movementId)
    {
        $movement = Movement::findOrFail($movementId);

        $records = PersonalRecord::where('movement_id', $movementId)
            ->selectRaw('user_id, MAX(value) as personal_record, MIN(date) as date')
            ->groupBy('user_id')
            ->orderByDesc('personal_record')
            ->get();

        $ranking = [];
        $position = 1;
        $previousRecord = null;

        foreach ($records as $index => $record) {
            if ($previousRecord !== $record->personal_record) {
                $position = $index + 1;
            }

            $ranking[] = [
                'nome' => $record->user->name,
                'recorde' => $record->personal_record,
                'posicao' => $position,
                'data' => Carbon::parse($record->date)->format('d/m/Y')
            ];

            $previousRecord = $record->personal_record;
        }

        return response()->json([
            'movement' => $movement->name,
            'ranking' => $ranking,
        ]);
    }
}
