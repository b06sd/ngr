<?php

namespace App\Exports;

use App\PhysicalPlanning;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FilingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PhysicalPlanning::all();
    }

    public function headings(): array
    {
        return [
            "payer_id",
            "file_no",
            "name",
            "address",
            "dev_location",
            "development_type",
            "structure_count",
            "floor_count",
            "clearance",
            "date_sent_out",
            "assessment",
            "assessment_type",
            "amount_paid",
            "receipt_number",
            "date_paid",
            "process_in_date",
            "process_out_date",
            "remarks",              
        ];
    }    
}
