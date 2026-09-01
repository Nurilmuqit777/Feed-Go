<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PruneExpiredCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prune-expired-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menghapus cache database yang sudah expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deleted = DB::table('cache')
            ->where('expiration', '<=', now()->timestamp)
            ->delete();

        $this->info("{$deleted} cache expired berhasil dihapus.");

        return self::SUCCESS;
    }
}
