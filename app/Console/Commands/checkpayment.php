<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class checkpayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:checkpayment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user Payment Period';

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
     * @return int
     */
    public function handle()
    {
        $data =User::where('next_payment',Carbon::today()->addDays(31))->get();
        foreach ($data as  $user){
            $user->update(['next_payment'=>Carbon::today()]);
        }
    }
}
