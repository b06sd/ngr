<?php

namespace App\Exports;

use App\Horc;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class HorcExport implements FromCollection, WithHeadings, WithStrictNullComparison
{ 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $c = Collection::make(new Horc);
        return $c;
    }

    public function headings(): array
    {
        return [
            "payer_id",
            "business_name",
            "address",
            "nature",
            "ownership",
            "contact_number",
            "email",
            "owners_address",
            "registration_date",
            "file_no",
            "horc_no",      
        ];
    }    
}
