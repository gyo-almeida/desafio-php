<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Appliance;

class CreateApplianceService {
    public function execute(array $data){
        if ($data['brand'] !== 'LG' && $data['brand'] !== 'Samsung' && $data['brand'] !== 'Electrolux' && $data['brand'] !== 'Brastemp' && $data['brand'] !== 'Fischer') {
            throw new AppError('Marca não permitida', 403);
        }

        return Appliance::create($data);
    }
}