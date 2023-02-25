<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contract;
use App\Models\MonthlyPercentage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $contracts = Contract::factory(20)->create();

        for ($i = 0; $i < 6; $i++) {
            $month = now()->subMonths($i)->startOfMonth();

            MonthlyPercentage::factory(1, [
                'currency' => 'BTC',
                'month' => $month,
            ])->create();
            MonthlyPercentage::factory(1, [
                'currency' => 'ETH',
                'month' => $month,
            ])->create();
            MonthlyPercentage::factory(1, [
                'currency' => 'LINK',
                'month' => $month,
            ])->create();
        }

        foreach ($contracts as $contract) {
            $contract->monthlyPercentages()->attach(
                MonthlyPercentage::query()->where('currency', $contract->currency)->pluck('id')
            );
        }
    }
}
