<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Batch;
use Carbon\Carbon;

class AddRayWhiteDoubleBayBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AddNewDoubleBayBatch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add A new batch for Ray White Double Bay Job';

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
        $batch = new Batch();
        $batch->user_id = 0;
        $batch->application = 'Recent Sales';
        $batch->job_name = 'RAY WHITE DOUBLE BAY';
        $batch->batch_date = Carbon::now();
        $batch->jobnumber = 0;
        $batch->records = 0;
        $batch->job_status = 'Open';
        $batch->remarks = '';
        $batch->export_date = null;
        $batch->save();
    }
}
