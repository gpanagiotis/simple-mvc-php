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
//        print_r($this->db);exit;
        mysqli_close($this->db);
    }

    public function countRows($count_rows_query)
    {
        //echo $count_rows_query;
        $results = $this->db->query($count_rows_query);
        $row = $results->fetch_assoc();

        return ($row['no_of_requests']);
    }

    public function limitPaging()
    {

        $limit = PAGING;
        //TODO::mysqli validation     
        if (isset($_GET['limit']) && intval($_GET['limit']) > 0) {
            $limit = intval($_GET['limit']);
        }
        return $limit;
    }

    public function startingRow()
    {
        $startingRow = 0;
        //TODO::mysqli validation
        if (isset($_GET['page']) && intval($_GET['page']) > 0) {
            $startingRow = $_GET['page'] * $this->limitPaging() - $this->limitPaging();
        }
        return $startingRow;
    }

    public function sanitizeString($var)
    {
        $util = new Utilities();
        return $util->sanitizeString($var);
    }

    public function sanitizeNumber($var)
    {
        $util = new Utilities();
        return $util->sanitizeNumber($var);
    }

    public function sanitize($var, $type)
    {
        $util = new Utilities();
        return $util->sanitize($var, $type);
    }

    public function getFields($table)
    {
        $db = $this->connect();


        $q = "SHOW COLUMNS FROM " . $table;
//        $this->pre($table);

        $result = mysqli_query($db, $q);

        $rows = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[$row['Field']] = $row['Type'];
        }
//        $this->pre( $rows);
        $this->disconnect();
        return $rows;

    }


    public function ormSave($post, $table)
    {

        $fields = $this->getFields($table);
//        $this->pr($fields);
        $db = $this->connect();
        $q = "UPDATE `" . $table . "` SET ";
        foreach ($_POST as $k => $v) {
//            echo '<br>';
            if (array_key_exists($k, $fields) && $k != "id") {
//                echo  $k;
                $q .= "`" . $k . "`=" . $this->sanitize($_POST[$k], $fields[$k]) . ",";
            } else {
//                echo $k.' does not exists in db';
            }
        }
        $q = substr($q, 0, -1) . " WHERE id=" . $post['id'] . "; ";

//        $this->pr($post);
//        echo $q;
//        exit;

        $results = $db->query($q);
        $this->disconnect();
        return $results;
    }


    public function ormRawSave($data, $table)
    {

        $fields = $this->getFields($table);
        $db = $this->connect();
        $q = "UPDATE `" . $table . "` SET ";
        foreach ($data as $k => $v) {
            if (array_key_exists($k, $fields) && $k != "id") {
                $q .= "`" . $k . "`=" . $this->sanitize($data[$k], $fields[$k]) . ",";
            }
        }
        $q = substr($q, 0, -1) . " WHERE id=" . $data['id'] . "; ";


        $results = $db->query($q);
        $this->disconnect();
        return $results;
    }

    public function ormNewRecord($table)
    {
        $db = $this->connect();

        $q = "INSERT INTO " . $table . "  () VALUES ()";
        $db->query($q);

        $maxID = mysqli_insert_id($db);
        $this->disconnect();

        foreach ($_POST as $k => $v) {

            if (is_null($_POST[$k]) || empty($_POST[$k])) {
                $_POST[$k] = "null";
            }
        }

        return $maxID;

    }

    public function ormGetData($table, $id)
    {

        $db = $this->connect();

        $data = array();

        $q = "SELECT * FROM " . $table
            . "where id=" . $id;

        $results = $db->query($q);

        $data = $results->fetch_all(MYSQLI_ASSOC);
        $this->disconnect();
        if (count($data))
            return $data[0];
    }

    public function ormGetTableData($table, $orderColumn = null)
    {

        $db = $this->connect();

        $data = array();

        $q = "SELECT * FROM " . $table;

        if ($orderColumn) {
            $q .= ' order by ' . $orderColumn;
        }
        //var_dump($q); die();

        $results = $db->query($q);

        $data = $results->fetch_all(MYSQLI_ASSOC);
        $this->disconnect();
        return $data;
    }

    public function ormNewData($table)
    {
        $data = array();
        $db = $this->connect();
        $q = "SHOW COLUMNS FROM " . $table;
        $result = mysqli_query($db, $q);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row['Field'];
//            echo $row['Default'].'<br/>';
            $data[$row['Field']] = (is_numeric($row['Default'])) ? 0 : null;
//            $data[$row['Field']] = null;
        }
        $data['id'] = 0;
//        $this->pre( $data);


        return $data;
    }




}
