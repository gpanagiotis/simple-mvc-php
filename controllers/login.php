<?php
require FILE_PATH . '/views/login.php';
require FILE_PATH . '/models/login.php';


class LoginController extends BaseCore // BaseHelperController
{


    public function index()
    {
        $this->display();
    }


    public function doLogin()
    {
//  return;
        if (isset($_POST['username']) && isset($_POST['password'])) {

            $username = $this->sanitize($_POST['username'], 'string');
            $password = $this->sanitize($_POST['password'], 'string');
            $model = new LoginModel();
            if ($model->loginUser($username, $password)) {
                switch ($_SESSION['group_id']) {
                    case 1:
                        header("Location: " . URL_PATH . '/index.php?task=home');
                        break;
                        echo 'user has no group';
                        header("Location: " . URL_PATH . '/index.php?task=login');
                }
            } else {
                $_SESSION['error'] = 'Username or password are not valid!!!';
                header("Location: " . URL_PATH . '/index.php?task=login');
            }

        }

    }

    public function doLogout()
    {
        session_destroy();
        header("Location: " . URL_PATH . '/index.php?task=login');
    }

    private function display()
    {
        $view = new LoginView();
        $view->output();
    }


    public static function sanitize($var, $type)
    {
        $util = new Utilities();
        return $util->sanitize($var, $type);
    }


}
