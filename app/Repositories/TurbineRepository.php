<?php

namespace App\Repositories;

use App\Models\Turbine;

class TurbineRepository
{
    public function all(int $per_page, int $page)
    {
        return Turbine::paginate($per_page, $page);
    }

    public function create(array $params): Turbine
    {
        return Turbine::create($params);
    }

    public function update(int $id, array $params): ?bool
    {
        $turbine = Turbine::find($id);

        if (!$turbine) {
            return null;
        }

        return $turbine->update($params);
    }

    public function delete(int $id): ?bool
    {
        $turbine = Turbine::find($id);

        if (!$turbine) {
            return null;
        }

        return $turbine->delete();
    }
}
