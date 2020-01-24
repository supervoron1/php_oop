<?php

namespace app\engine;

class Autoload
{
    public function loadClass($className)
    {
        // $fileName = (str_replace(['app', '\\'], [ROOT_DIR, DS], $className) . ".php");
        $fileName = realpath(str_replace(['app', '\\'], ['..', DS], $className) . ".php");

//        var_dump($fileName);
        if (file_exists($fileName)) {
            include $fileName;

        }


    }
}
