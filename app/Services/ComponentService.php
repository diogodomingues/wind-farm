<?php

namespace App\Services;

use App\Repositories\ComponentRepository;

class ComponentService
{
    const DEFAULT_RECORDS_PAGE = 1;
    const DEFAULT_RECORDS_PER_PAGE = 15;

    private ComponentRepository $componentRepository;

    public function __construct(ComponentRepository $componentRepository)
    {
        $this->componentRepository = $componentRepository;
    }

    public function show(array $params)
    {
        $per_page = (!empty($params['per_page'])) ? $params['per_page'] : self::DEFAULT_RECORDS_PER_PAGE;
        $page = (!empty($params['page'])) ? $params['page'] : self::DEFAULT_RECORDS_PAGE;

        $result = $this->componentRepository->all($per_page, $page);

        if (empty($result)) {
            return [];
        }

        return $result;
    }

    public function create(array $params)
    {
        return  $this->componentRepository->create($params);
    }

    public function edit(int $id, array $params)
    {
        return  $this->componentRepository->update($id, $params);
    }

    public function delete(int $id)
    {
        return  $this->componentRepository->delete($id);
    }
}
