<?php

namespace App\Jobs;

use App\Land;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Redis;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessLandCsvUpload implements ShouldQueue
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
            Land::updateOrCreate([
                'payer_id' => $row[0],
                'fileNo'=> $row[1],  
                'Date' => $row[2],
                'column1' => $row[3],
                'natOfBus' => $row[4],
                'propLocation' => $row[5],
                'value' => $row[6],
                'assignor' => $row[7],
                'column2' => $row[8],
                'address1' => $row[9],
                'assignee' => $row[10],
                'column3' => $row[11],
                'address2' => $row[12],
                'cgt' => $row[13],
                'assignorPay' => $row[14],
                'assigneePay' => $row[15],
                'borrowers' => $row[16],
                'stampDuty' => $row[17],
                'premises' => $row[18]
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
