<?php

namespace App;

use App\Helper as Helper;

class View
{
    const DIR = __DIR__ . '/../src/Views';

    public function __construct()
    {
        $this->helper = new Helper();
    }

    public function render($subDir = 'index', string $viewName = 'index', array $data = [])
    {
        $file = self::DIR . '/' . $subDir . '/' . $viewName . '.php';
        if (!file_exists($file)) {
            return false;
        }
        (empty($data) ?: extract($data));
        ob_start();
        include(self::DIR . '/common/header.php');
        include(self::DIR . '/common/navi.php');
        include($file);
        include(self::DIR . '/common/footer.php');
        $template = ob_get_contents();
        ob_end_clean();
        return $template;
    }

    protected function inc(string $folder, string $templateName)
    {
        $file = self::DIR . '/' . $folder . '/' . $templateName . '.php';
        if (!file_exists($file)) {
            return false;
        }
        ob_start();
        include($file);
        $template = ob_get_contents();
        ob_end_clean();
        echo $template;
    }

}