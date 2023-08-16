<?php

namespace App\Repositories;

use App\Models\Component;

class ComponentRepository
{
    public function all(int $per_page, int $page)
    {
        return Component::paginate($per_page, $page);
    }

    public function create(array $params): Turbine
    {
        return Component::create($params);
    }

    public function update(int $id, array $params): ?bool
    {
        $component = Component::find($id);

        if (!$component) {
            return null;
        }

        return $component->update($params);
    }

    public function delete(int $id): ?bool
    {
        $component = Component::find($id);

        if (!$component) {
            return null;
        }

        return $component->delete();
    }
}
