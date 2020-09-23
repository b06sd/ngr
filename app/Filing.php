<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filing extends Model
{
    protected $fillable = [
        'file_no',
        'name',
        'address',
        'dev_location',
        'development_type',
        'structure_count',
        'floor_count',
        'clearance',
        'date_sent_out',
        'assessment',
        'assessment_type',
        'amount_paid',
        'receipt_number',
        'date_paid',
        'process_in_date',
        'process_out_date',
        'remarks',
        'created_at',
        'updated_at',       
    ];
}
