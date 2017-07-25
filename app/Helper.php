<?php

namespace App;


class Helper
{

    const DIR = __DIR__ . '/../src/Helpers';

    /** @var  $activeHelpers array of activated helpers */
    private $activeHelpers;

    public function __call($method, array $args = [])
    {
        $helperName = 'Src\\Helpers\\' . ucfirst($method);

        if (!class_exists($helperName)) {
            return false;
        }
        if (!array_key_exists($helperName, $this->activeHelpers)) {
            $this->activeHelpers[$helperName] = new $helperName();
        }
        $helper = $this->activeHelpers[$helperName];
        if (!method_exists($helper, $method)) {
            return false;
        }

        return call_user_func_array([$helper, $method], $args);

    }
}