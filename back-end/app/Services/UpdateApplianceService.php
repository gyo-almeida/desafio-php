<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Appliance;

class UpdateApplianceService {
    public function execute(array $data, $id){
        $num = intval($id);
        $appliance = Appliance::find($num);

        if(!$appliance){
            throw new AppError('Produto não encontrado', 404);
        }

        $appliance->update($data);

        return $appliance;
    }
}