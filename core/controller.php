<?php

class BaseController extends BaseCore
{

	public function __construct() {
		//echo 'controller constructed <br>';
		if( !isset($_SESSION['is_user_logged']) || $_SESSION['is_user_logged'] != 1)
		{
			// $_SESSION['error'] = 'You are not logged!!!!';
            // header("Location: ".URL_PATH.'/index.php?task=login');
			// exit;
		}
	}

    public function validate($var)
    {
       $util = new Utilities();
       return  $util->validate($var);
	}

	public function sanitizeString($var)
    {
       $util = new Utilities();
       return  $util->sanitizeString($var);
	}

	public function sanitizeNumber($var)
    {
       $util = new Utilities();
       return  $util->sanitizeNumber($var);
    }

}