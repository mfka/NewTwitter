<?php

/**
 * Created by PhpStorm.
 * User: mfka
 * Date: 28.12.16
 * Time: 07:53
 */
class TwitterController
{

    /**
     * @return object
     */
    public function getUser()
    {
        return $this->objUser;
    }


//    public function __set($key, $value)
//    {
//        $this->$key = $value;
//    }
//
//    public function __get($key)
//    {
//        return $this->$key;
//    }


    /**
     * @param object $objUser
     */
    public function setUser($objUser)
    {
        $this->objUser = $objUser;
    }


}