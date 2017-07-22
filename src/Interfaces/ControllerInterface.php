<?php

namespace Src\Interfaces;


use App\Routing;

interface ControllerInterface
{
    public function setParams(string $type, array $params);

    public function setRouting(Routing $routing);
}