<?php

namespace App;

use App\Jobs\ProcessCsvUpload;
use Illuminate\Database\Eloquent\Model;

class PhysicalPlanning extends Model
{
    protected $table = 'physical_plannings';
    protected $guarded = [];
    // protected $fillable = [
    //     "payer_id",
    //     'file_no',
    //     'name',
    //     'address',
    //     'dev_location',
    //     'development_type',
    //     'structure_count',
    //     'floor_count',
    //     'clearance',
    //     'date_sent_out',
    //     'assessment',
    //     'assessment_type',
    //     'amount_paid',
    //     'receipt_number',
    //     'date_paid',
    //     'process_in_date',
    //     'process_out_date',
    //     'remarks',
    //     'created_at',
    //     'updated_at',       
    // ];

    public function importToDb()
    {
        ob_start();
        ob_clean();

        ini_set('max_execution_time', 6000);
        ini_set('memory_limit', '100000M');
        // set_time_limit(8000000);
        $path = resource_path('pending-files/*.csv');
        $files = glob($path);

        foreach($files as $file)
        {
            ProcessCsvUpload::dispatch($file);
        }
    }
}
