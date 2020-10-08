<?php

namespace App\Jobs;

use App\Horc;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Redis;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessHorcCsvUpload implements ShouldQueue
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
        
        Redis::throttle('upload-csv')->allow(1)->every(20)->then(function () {
            //Job Logic...
            
            dump('processing this file:----', $this->file);
            $data = array_map('str_getcsv', file($this->file));

        foreach($data as $row){
             //dd($row);
            Horc::updateOrCreate([
                "payer_id" => $row[0],
                "business_name"=> $row[1],  
                "address" => $row[2],
                "nature" => $row[3],
                "ownership" => $row[4],
                "contact_number" => $row[5],
                "email" => $row[6],
                "owners_address" => $row[7],
                "registration_date" => $row[8],
                "file_no" => $row[9],
                "horc_no" => $row[10],
            ]);
        }

            dump('done this file:----', $this->file);

            unlink($this->file);

        }, function () {
            //could not obtain Lock...

            return $this->release(10);
        });
        
    }
}
