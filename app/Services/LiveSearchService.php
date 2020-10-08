<?php

namespace App\Services;

use App\Land;
use App\Horc;
use App\LiveSearch;
use App\PhysicalPlanning;

class LiveSearchService{
    public static function getLiveSearchResult(string $query = NULL){
        $land_data = Land::where('fileNo', 'like', '%'.$query.'%')
        ->orWhere('Date', 'like', '%'.$query.'%')
        ->orWhere('payer_id', 'like', '%'.$query.'%')
        ->orWhere('assignor', 'like', '%'.$query.'%')
        ->orWhere('natOfBus','like', '%'.$query.'%')
        ->orWhere('propLocation','like', '%'.$query.'%')
        ->orWhere('assignee','like', '%'.$query.'%')
        ->orWhere('value', 'like', '%'.$query.'%')
        ->orderBy('fileNo', 'desc')
        ->get();

        $planning_data = PhysicalPlanning::where('file_no', 'like', '%'.$query.'%')
        ->orWhere('payer_id', 'like', '%'.$query.'%')
        ->orWhere('name', 'like', '%'.$query.'%')
        ->orWhere('address', 'like', '%'.$query.'%')
        ->orWhere('dev_location','like', '%'.$query.'%')
        ->orWhere('development_type','like', '%'.$query.'%')
        ->orWhere('clearance','like', '%'.$query.'%')
        ->orWhere('receipt_number', 'like', '%'.$query.'%')
        ->orderBy('file_no', 'desc')
        ->get(); 
        
        $horc_data = Horc::where('file_no', 'like', '%'.$query.'%')
        ->orWhere('payer_id', 'like', '%'.$query.'%')
        ->orWhere('business_name', 'like', '%'.$query.'%')
        ->orWhere('address', 'like', '%'.$query.'%')
        ->orWhere('nature','like', '%'.$query.'%')
        ->orWhere('ownership','like', '%'.$query.'%')
        ->orWhere('contact_number','like', '%'.$query.'%')
        ->orWhere('email', 'like', '%'.$query.'%')
        ->orWhere('owners_address', '%'.$query.'%')
        ->orWhere('file_no', '%'.$query.'%')
        ->orWhere('horc_no', '%'.$query.'%')
        ->orderBy('file_no', 'desc')
        ->get();         

        return [$land_data, $planning_data, $horc_data];
    }
}