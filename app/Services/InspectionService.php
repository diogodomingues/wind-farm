<?php

namespace App\Services;

use App\Repositories\InspectionRepository;

class InspectionService
{
    private InspectionRepository $inspectionRepository;

    public function __construct(InspectionRepository $inspectionRepository)
    {
        $this->inspectionRepository = $inspectionRepository;
    }
}
