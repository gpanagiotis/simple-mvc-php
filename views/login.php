<?php
class LoginView extends BaseView
{
    public function output() {
        require(FILE_PATH.'/layouts/login_tpl.php');
    }
}