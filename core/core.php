<?php

class BaseCore
{


    public function lang()
    {
        return $_SESSION[$_GET['task']];
    }

    public function pr($param)
    {
        $utiil = new Utilities();
        $utiil->pr($param);
    }

    public function pre($param)
    {
        $utiil = new Utilities();
        $utiil->pr($param);
        exit;
    }


}