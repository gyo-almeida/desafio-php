<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Appliance;

class GetOneByIdApplianceService {
    public function execute($id){
        $appliance = Appliance::find($id);

        if(!$appliance){
            throw new AppError('Produto não encontrado', 404);
        }

        return $appliance;
    }
}