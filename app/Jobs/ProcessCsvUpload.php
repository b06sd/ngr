<?php

namespace App\Jobs;

use App\PhysicalPlanning;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Redis;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessCsvUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('upload-csv')->allow(10)->every(60)->then(function () {
            dump('Processing this file:---', $this->file);
            $data = array_map('str_getcsv', file($this->file));

            foreach($data as $row)
            {
                PhysicalPlanning::updateOrCreate([
                    'payer_id' => $row[0],
                    "file_no" => $row[1],
                    "name" => $row[2],
                    "address" => $row[3],
                    "dev_location" => $row[4],
                    "development_type" => $row[5],
                    "structure_count" => $row[6],
                    "floor_count" => $row[7],
                    "clearance" => $row[8],
                    "date_sent_out" => $row[9],
                    "assessment" => $row[10],
                    "assessment_type" => $row[11],
                    "amount_paid" => $row[12],
                    "receipt_number" => $row[13],
                    "date_paid" => $row[14],
                    "process_in_date" => $row[15],
                    "process_out_date" => $row[16],
                    "remarks" => $row[17],                     
                ]);
            }
            dump('Done processing this file:---', $this->file);
            unlink($this->file);
        }, function () {
            // Could not obtain lock...
        
            return $this->release(10);
        });


    }
}
