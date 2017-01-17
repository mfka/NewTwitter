<?php

/**
 * Created by PhpStorm.
 * User: mfka
 * Date: 12.12.16
 * Time: 08:35
 */
class View
{
    public $data = array();

    public function __construct()
    {
        require_once __DIR__ . '/../../views/common/header.php';
        require_once __DIR__ . '/../../views/common/navi.php';
    }

    public function render( $viewName = 'index/index')
    {
        $file = __DIR__ . '/../../views/' . $viewName . '.php';

        if (file_exists($file)) {
            require_once($file);
        } else {
            echo "Error: View does not exists";
        }
    }


    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return true;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        } else {
            return false;
        }
    }

    public function __destruct()
    {
        require_once __DIR__ . '/../../views/common/footer.php';
    }

    public function __call($method, $args)
    {
        switch ($method) {
            case 'helper':
                $file = __DIR__ . '/../../views/helper/' . $args;
                if (file_exists($file)) {
                    echo 'TAK!';
                    require_once $file;
                } else {
                    return false;
                }
                break;
            default:
                return false;
                break;
        }
    }
}