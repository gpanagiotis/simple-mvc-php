<?php session_start();
require 'includes/config.php';
require FILE_PATH . '/helpers/utilities.php';
require FILE_PATH . '/core/core.php';
require FILE_PATH . '/core/model.php';
require FILE_PATH . '/core/controller.php';
require FILE_PATH . '/core/view.php';


// $lang = parse_ini_file(FILE_PATH . '/languages/el/index.ini',  $scanner_mode = INI_SCANNER_RAW);
// echo '<pre>';
// print_r($lang); 
// echo '</pre>';
//test commit2

// if (!isset($_SESSION['is_user_logged']) || $_SESSION['is_user_logged'] != 1) {
//     $_SESSION['error'] = 'You are not logged!!!!';
//     //$task = 'login';        
//     // header("Location: ".URL_PATH.'/index.php?task=login');
//     // exit;
// }

if (!isset($_SESSION['lang'])) {
    //echo 'load lang';
    $lang = parse_ini_file(FILE_PATH . '/languages/el/index.ini');
    $_SESSION['lang'] = $lang;
    // echo '<pre>';
    // print_r($lang); 
    // echo '</pre>';
    // exit;
}

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
// exit;

// $task = 'login';
$task = 'login';



if (isset($_GET['task'])) { 
    $task = $_GET['task'];
}

if (!isset($_SESSION[$task]) || true) {
    if (file_exists(FILE_PATH . '/languages/el/' . $task . '.ini')) {      
        $_SESSION[$task] = parse_ini_file( FILE_PATH . '/languages/el/' . $task . '.ini');
        // echo '<pre>';
        // print_r( $_SESSION[$task]['MARITAL_STATUS'] ); 
        // echo '</pre>';
    } else {
        //echo 'languages '.$task.' does not exists';
    
    }
}


if (file_exists(FILE_PATH . '/controllers/' . $task . '.php')) {
    require FILE_PATH . '/controllers/' . $task . '.php';
    $classname = ucfirst($task) . 'Controller';
    if (class_exists($classname)) {
        $controller = new $classname();
        if (isset($_GET['method']) && method_exists($controller, $_GET['method'])) {
            $controller->{$_GET['method']}(); 
        } else {
            // echo  ' method not exists, controller :';
            // echo '<pre>';
            // print_r($controller);
            // echo '</pre>';
            $controller->index();
        }

    }
} else {
     echo 'controller does not exists';
    // echo '<pre>';
    // print_r($_SESSION['is_user_logged']);
    // echo '</pre>';
    if (!isset($_SESSION['is_user_logged']) || $_SESSION['is_user_logged'] != 1) {
        header("Location: " . URL_PATH . '/index.php?task=login');
    } else {
        http_response_code(404);
    }
    die();
}

// if (isset($_SESSION['group_id'])) {
//     echo '<br><br><br><br>';
//     echo '<pre>';
//     print_r($_SESSION);
//     echo '</pre>';
// }
