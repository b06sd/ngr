<?php

namespace App\Exports;

use App\Land;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LandExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $c = Collection::make(new Land);
        return $c;
    }

    public function headings(): array
    {
        return [
            "payer_id",
            "fileNo",
            "Date",
            "column1",
            "natOfBus",
            "propLocation",
            "value",
            "assignor",
            "column2",
            "address1",
            "assignee",
            "column3",
            "address2",
            "cgt",
            "assignorPay",
            "assigneePay",
            "borrowers",
            "stampDuty",
            "premises",          
        ];
    }    
}
