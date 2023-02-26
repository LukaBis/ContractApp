<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\UsdRatioService;

class MonthlyPercentage extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($monthlyPercentage) {
            $usdRatioService = new UsdRatioService();

            try {
                $monthlyPercentage->usd_ratio = $usdRatioService::getUsdValueOfOneCoin(
                    $monthlyPercentage->currency,
                    $monthlyPercentage->month
                );
            } catch (\Exception $ex) {
                dd($ex->getMessage());
            }
            
        });
    }
}
