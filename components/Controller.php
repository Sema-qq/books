<?php

/**
* 
*/
class Controller
{
    /**
     * @param $path
     * @param array|null $array
     * @return bool
     */
    protected function render($path, array $array = null)
    {
        include_once ROOT.$path;
        return true;
    }
}