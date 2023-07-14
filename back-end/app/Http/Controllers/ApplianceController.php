<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateApplianceRequest;
use App\Http\Requests\UpdateApplianceRequest;
use App\Services\CreateApplianceService;
use App\Services\DeleteApplianceService;
use App\Services\GetAllApplianceService;
use App\Services\GetOneByIdApplianceService;
use App\Services\UpdateApplianceService;

class ApplianceController extends Controller {
    public function create(CreateApplianceRequest $request){
        $createApplianceService = new CreateApplianceService();

        return $createApplianceService->execute($request->all());
    }

    public function update(UpdateApplianceRequest $request, $id){
        $updateApplianceService = new UpdateApplianceService();

        return $updateApplianceService->execute($request->all(), $id);
    }

    public function delete($id){
        $deleteApplianceService = new DeleteApplianceService();

        return $deleteApplianceService->execute($id);
    }

    public function getAll(){
        $getApplianceService = new GetAllApplianceService();

        return $getApplianceService->execute();
    }

    public function getOneById($id){
        $getApplianceService = new GetOneByIdApplianceService();

        return $getApplianceService->execute($id);
    }
}