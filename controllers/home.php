<?php
require FILE_PATH . '/models/home.php';

class HomeController extends BaseController
{

    public function index()
    {

        $this->display();
    }

    private function display()
    {

        $model = new HomeModel();


        require FILE_PATH . '/views/home.php';


    }


}