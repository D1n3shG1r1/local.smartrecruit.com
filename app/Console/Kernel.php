<?php

namespace App\Console;


use App\Console\Commands\DeactivateOldCandidates;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Register the Artisan commands for the application.
     */
    protected $commands = [
        DeactivateOldCandidates::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        /*
        Don't Forget: Set Up Cron on Server
        For scheduled commands to run, your server must have this cron job set up (once):

        
        * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
        
        This runs Laravel’s scheduler every minute, which then checks which scheduled commands should fire.
        
        */

        // You can schedule the command to run periodically if needed.
        // please run these commands in following sequence
        //## 1
        $schedule->command('candidates:deactivate-old')->daily();

        //php artisan candidates:deactivate-old
        
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
