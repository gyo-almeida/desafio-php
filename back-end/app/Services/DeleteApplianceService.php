<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Appliance;

class DeleteApplianceService {
    public function execute($id){
        $num = intval($id);

        $appliance = Appliance::where('id', $num)->firstOrFail();

        if(!$appliance){
            throw new AppError('Produto não encontrado', 404);
        }

        $appliance->delete();
    }
}