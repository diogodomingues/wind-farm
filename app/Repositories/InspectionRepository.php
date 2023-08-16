<?php

namespace App\Repositories;

use App\Models\Inspection;

class InspectionRepository
{
    public function all(int $per_page, int $page)
    {
        return Inspection::paginate($per_page, $page);
    }

    public function create(array $params): Turbine
    {
        return Inspection::create($params);
    }

    public function update(int $id, array $params): ?bool
    {
        $inspection = Inspection::find($id);

        if (!$inspection) {
            return null;
        }

        return $inspection->update($params);
    }

    public function delete(int $id): ?bool
    {
        $inspection = Inspection::find($id);

        if (!$inspection) {
            return null;
        }

        return $inspection->delete();
    }
}
