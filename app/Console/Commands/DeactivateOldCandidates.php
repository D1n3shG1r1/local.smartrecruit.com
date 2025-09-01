<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Users_model;
use App\Models\CandidateResumeData_model;
use Carbon\Carbon;

class DeactivateOldCandidates extends Command
{
    protected $signature = 'candidates:deactivate-old';
    protected $description = 'Deactivate candidates not updated in the last 7 days';

    public function handle()
    {
        $cutoffDate = Carbon::now()->subDays(7);

        // Get candidate IDs where updatedDateTime is older than 7 days and still active
        $candidates = CandidateResumeData_model::where('updatedDateTime', '<=', $cutoffDate)
        ->pluck('candidateId'); // More efficient than select + get

        $count = 0;

        if ($candidates->isNotEmpty()) {
            // Update all related user records
            $count = Users_model::whereIn('id', $candidates)->update(['active' => 0]);
        }

        $this->info("Deactivated $count candidate(s).");
    }
}
