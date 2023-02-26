<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractResource;
use App\Models\Contract;
use App\Models\MonthlyPercentage;
use Illuminate\Support\Collection;

class ContractController extends Controller
{
    public function show(Contract $contract)
    {
        $contract->load('monthlyPercentages');

        $contract->monthly = $contract->monthlyPercentages->reduce(function (
            Collection $carry,
            MonthlyPercentage $monthlyPercentage
        ) use ($contract) {
            $previousAmount = $carry->isEmpty() ? $contract->invested_amount : $carry->last()->value;

            $newValue = $previousAmount * (1 + ($monthlyPercentage->percentage / 100));

            $carry->push((object) [
                'month' => $monthlyPercentage->month,
                'percentage' => $monthlyPercentage->percentage,
                'value' => $newValue,
                'valueInUsd' => round($newValue * $monthlyPercentage->usd_ratio, 2)
            ]);

            return $carry;
        }, collect([]));

        return new ContractResource($contract);
    }
}
