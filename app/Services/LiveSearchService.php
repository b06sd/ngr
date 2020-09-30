<?php

namespace App\Services;

use App\Land;
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

        return [$land_data, $planning_data];
    }
}