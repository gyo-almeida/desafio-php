<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Appliance;

class GetAllApplianceService {
    public function execute(){
        $appliances =  Appliance::all();

        return $appliances;
    }
}