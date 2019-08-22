<?php

namespace App\Console\Commands;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeactivateLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deactivate:links';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate users link';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Link::where('updated_at', '<', Carbon::now()->subDays(7))->delete();
    }
}
