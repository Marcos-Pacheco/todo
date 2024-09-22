<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the application tests';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $phpunit = base_path('./vendor/bin/phpunit --colors=always --configuration phpunit.xml');

        $command = escapeshellcmd($phpunit);

        passthru($command, $result);

        return $result;
    }
}
