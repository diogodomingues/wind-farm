<?php

namespace App\Services;

use App\Models\Component;
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

        $result = $this->componentRepository->all($per_page);

        if (empty($result)) {
            return [];
        }

        return $this->formatData($result);
    }

    /**
     * Format data to display on the view
     */
    private function formatData($data)
    {
        $result = [];

        foreach ($data as $row) {
            $tmp = [
                'id' => $row->id,
                'name' => $row->name,
                'description' => $row->description,
                'level_damage' => Component::LEVEL_DAMAGE[$row->level_damage],
                'turbine' => $row->turbine->name
            ];

            array_push($result, $tmp);
        }

        return $result;
    }

    public function edit(int $id)
    {
        return  $this->componentRepository->getById($id);
    }

    public function create(array $params)
    {
        return  $this->componentRepository->create($params);
    }

    public function update(int $id, array $params)
    {
        return  $this->componentRepository->update($id, $params);
    }

    public function delete(int $id)
    {
        return  $this->componentRepository->delete($id);
    }
}
