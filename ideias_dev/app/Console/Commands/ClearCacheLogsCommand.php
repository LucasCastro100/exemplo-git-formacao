<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ClearCacheLogsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-cache-logs-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //SMS SALVA NO LOG
        Log::info('CHACH E LOG LIMPOS!');

        // LIMPEZA CACH
        $this->call('cache:clear');

        //LIMPEZA LOG
        $this->call('log:clear');
    }
}
