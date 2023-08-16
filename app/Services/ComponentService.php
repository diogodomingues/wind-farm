<?php

namespace App\Services;

use App\Repositories\ComponentRepository;

class ComponentService
{
    private ComponentRepository $componentRepository;

    public function __construct(ComponentRepository $componentRepository)
    {
        $this->componentRepository = $componentRepository;
    }
}
