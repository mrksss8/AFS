<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\ListofBackup;

class BackupSuccessfulListener
{
 
    public function handle($event)
    {
        
        ListofBackup::create([
            'path' => $event->backupDestination->newestBackup()->path()
        ]);
        
    }
}
