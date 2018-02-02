<?php

namespace App;

use App\Helper as Helper;
use Exception;

class View
{
    const VIEWS = __DIR__ . '/../views';

    public function __construct()
    {
        $this->helper = new Helper();
    }

    public function render(string $template = 'index', array $data = [])
    {
        $file = sprintf('%s/%s', self::VIEWS, $template);
        try {
            if (!file_exists($file)) {
                throw new Exception('View not exists', 404);
            }
            (empty($data) ?: extract($data));
            ob_start();
            include(self::VIEWS . '/common/header.php');
            include(self::VIEWS . '/common/navi.php');
            include($file);
            include(self::VIEWS . '/common/footer.php');
            $template = ob_get_contents();
            ob_end_clean();
            return $template;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function inc(string $templateName = 'index/index'): void
    {
        $file = self::VIEWS . '/' . $templateName . '.php';
        if (!file_exists($file)) {
            return;
        }
        ob_start();
        include($file);
        $template = ob_get_contents();
        ob_end_clean();
        echo $template;
        return;
    }

}