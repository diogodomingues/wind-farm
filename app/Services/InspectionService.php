<?php

namespace App\Services;

use App\Repositories\InspectionRepository;

class InspectionService
{
    const DEFAULT_RECORDS_PAGE = 1;
    const DEFAULT_RECORDS_PER_PAGE = 15;

    private InspectionRepository $inspectionRepository;

    public function __construct(InspectionRepository $inspectionRepository)
    {
        $this->inspectionRepository = $inspectionRepository;
    }

    public function show(array $params)
    {
        $per_page = (!empty($params['per_page'])) ? $params['per_page'] : self::DEFAULT_RECORDS_PER_PAGE;
        $page = (!empty($params['page'])) ? $params['page'] : self::DEFAULT_RECORDS_PAGE;

        $result = $this->inspectionRepository->all($per_page, $page);

        if (empty($result)) {
            return [];
        }

        return $result;
    }

    public function create(array $params)
    {
        return  $this->inspectionRepository->create($params);
    }

    public function edit(int $id, array $params)
    {
        return  $this->inspectionRepository->update($id, $params);
    }

    public function delete(int $id)
    {
        return  $this->inspectionRepository->delete($id);
    }
}
