<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:db-refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (app()->isProduction()) {
            return self::FAILURE;
        }

        Storage::deleteDirectory('products');

        $this->call('migrate:refresh', [
            '--seed' => true
        ]);

        return self::SUCCESS;
    }
}
