<?php

namespace App\Imports;

use App\PhysicalPlanning;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class ImportFiling implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PhysicalPlanning([
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
            "created_at" => $row[18],
            "updated_at" => $row[19],  
        ]);
    }
    public function batchSize(): int
    {
        return 2000;
    }
    public function chunkSize(): int
    {
        return 2000;
    }
}
