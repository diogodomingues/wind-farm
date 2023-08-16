<?php

namespace App\Services;

use App\Repositories\TurbineRepository;

class TurbineService
{
    const DEFAULT_RECORDS_PAGE = 1;
    const DEFAULT_RECORDS_PER_PAGE = 15;

    private TurbineRepository $turbineRepository;

    public function __construct(TurbineRepository $turbineRepository)
    {
        $this->turbineRepository = $turbineRepository;
    }

    public function show(array $params)
    {
        $per_page = (!empty($params['per_page'])) ? $params['per_page'] : self::DEFAULT_RECORDS_PER_PAGE;
        $page = (!empty($params['page'])) ? $params['page'] : self::DEFAULT_RECORDS_PAGE;

        $result = $this->turbineRepository->all($per_page, $page);

        if (empty($result)) {
            return [];
        }

        return $result;
    }

    public function create(array $params)
    {
        return  $this->turbineRepository->create($params);
    }

    public function edit(int $id, array $params)
    {
        return  $this->turbineRepository->update($id, $params);
    }

    public function delete(int $id)
    {
        return  $this->turbineRepository->delete($id);
    }
}
