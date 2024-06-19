<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Commercial;
use App\Models\MonthlyPerformance;
use App\Models\Prospect;
use Carbon\Carbon;

class GenerateMonthlyPerformance extends Command
{
    protected $signature = 'performance:generate-monthly';
    protected $description = 'Generate monthly performance recap for each commercial';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $commercials = Commercial::all();
        $month = Carbon::now()->startOfMonth()->subMonth();

        foreach ($commercials as $commercial) {
            $points = $this->calculateMonthlyPoints($commercial->id, $month);

            MonthlyPerformance::create([
                'commercial_id' => $commercial->id,
                'points' => $points,
                'month' => $month,
            ]);

            // Reset points for the new month
            $commercial->points = 0;
            $commercial->save();
        }

        $this->info('Monthly performance recaps generated successfully.');
    }

    private function calculateMonthlyPoints($commercialId, $month)
    {
        $startDate = $month->copy()->startOfMonth();
        $endDate = $month->copy()->endOfMonth();

        $prospects = Prospect::where('commercial_id', $commercialId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $points = 0;

        foreach ($prospects as $prospect) {
            if ($prospect->validation_status == 'confirmed') {
                $points += 1;
            } elseif ($prospect->validation_status == 'denied') {
                $points -= 3;
            }
        }

        // Handle points deduction for pending prospects older than three days
        $threeDaysAgo = Carbon::now()->subDays(3);
        $pendingProspects = Prospect::where('commercial_id', $commercialId)
            ->where('validation_status', 'pending')
            ->where('created_at', '<', $threeDaysAgo)
            ->get();

        foreach ($pendingProspects as $prospect) {
            $points -= 1;
        }

        return $points;
    }
}
