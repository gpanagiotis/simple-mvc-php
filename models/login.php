<?php

class LoginModel extends BaseModel
{

    public function loginUser($username, $password)
    {
        $db = $this->connect();

        $q = sprintf("SELECT * FROM users where username = %s AND password = %s", $username, $password);

        $results = $db->query($q);


        if ($results->num_rows === 1) {

            $row = $results->fetch_assoc();
            $_SESSION['is_user_logged'] = '1';
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['group_id'] = $row['group_id'];
            return true;
        }
        return false;

    }

}