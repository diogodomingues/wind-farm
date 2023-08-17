<?php

namespace App\Repositories;

use App\Models\Component;

class ComponentRepository
{
    public function all(int $per_page)
    {
        return Component::with('turbine')->paginate($per_page);
    }

    public function getById(int $id): ?Component
    {
        return Component::find($id);
    }

    public function getComponentsByTurbine(int $id)
    {
        return Component::where('turbine_id', $id)->get();
    }

    public function create(array $params): Component
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
