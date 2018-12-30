<?php

class BaseModel extends BaseCore
{
    private $db;

    public function connect()
    {
        //echo 'model constructed  <br>';
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($db->connect_errno > 0) {
            die('Unable to connect to database [' . $db->connect_error . ']');
        }
        $this->db = $db;
        $db->set_charset("utf8");
        return $db;

    }

    public function disconnect()
    {
        mysqli_close($this->db);
    }


}
