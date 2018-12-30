<?php

class BaseController extends BaseCore
{

    public function __construct()
    {
        //echo 'controller constructed <br>';
        if (!isset($_SESSION['is_user_logged']) || $_SESSION['is_user_logged'] != 1) {
            // $_SESSION['error'] = 'You are not logged!!!!';
            // header("Location: ".URL_PATH.'/index.php?task=login');
            // exit;
        }
    }


}