<?php

namespace App\Repositories;

use App\Models\Inspection;

class InspectionRepository
{
    public function all(int $per_page)
    {
        return Inspection::with('turbine')->with('user')->paginate($per_page);
    }

    public function create(array $params): Inspection
    {
        return Inspection::create($params);
    }

    public function getById(int $id): ?Inspection
    {
        return Inspection::find($id);
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
