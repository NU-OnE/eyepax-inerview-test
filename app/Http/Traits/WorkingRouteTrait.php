<?php

namespace App\Http\Traits;

trait WorkingRouteTrait
{
    protected array $all_routes = [
      "Galle" => "Galle",
      "Colombo" => "Colombo",
      "Panadura" => "Panadura",
    ];

    protected function getAllWorkingRoutes(): array
    {
        return $this->all_routes;
    }
}
