<?php

namespace App;

use App\Jobs\ProcessHorcCsvUpload;
use Illuminate\Database\Eloquent\Model;

class Horc extends Model
{
    protected $table = 'horcs';
    protected $guarded = [];

    public function importToDb()
    {
        ob_start();
        ob_clean();

        ini_set('max_execution_time', 6000);
        ini_set('memory_limit', '100000M');
        // set_time_limit(8000000);
        $path = resource_path('pending-files/horc/*.csv');
        $files = glob($path);

        foreach($files as $file)
        {
            ProcessHorcCsvUpload::dispatch($file);
        }
    }      
}
