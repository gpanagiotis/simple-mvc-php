<?php

class Utilities
{

    public static function sanitize($var, $type)
    {
        if (strpos($type, 'date') !== false) {
            return sanitizeDate($var);
        } elseif
        (strpos($type, 'int') !== false) {
            return sanitizeNumber($var);
        } else
            $length = intval(preg_replace('/\D/', '', $type));
        return sanitizeString($var, $length);
    }


    static function url_origin($s, $use_forwarded_host = false)
    {
        $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on');
        $sp = strtolower($s['SERVER_PROTOCOL']);
        $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
        $port = $s['SERVER_PORT'];
        $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
        $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
        $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
        return $protocol . '://' . $host;
    }

    public function full_url($s, $use_forwarded_host = false)
    {
        return $this->url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
    }

    public function parse_url($param1, $param2)
    {
        $absolute_url = $this->full_url($_SERVER);
        echo $absolute_url;
        if (strpos($absolute_url, $param1) !== false) {
            $parsedUrl = strstr($absolute_url, $param1, true);
        } else {
            $parsedUrl = $absolute_url;
        }

        if (strpos($parsedUrl, $param2) !== false) {
            $parsedUrl = strstr($parsedUrl, $param2, true);
        }

        return $parsedUrl;

    }

    public function pr($param)
    {
        echo '<pre>';
        print_r($param);
        echo '</pre>';
    }

    public function pre($param)
    {
        pr($param);
        exit;
    }

    function formatDate($date)
    {
        return strtotime($date) ? date('d-m-Y', strtotime($date)) : '';
    }


}

function sanitizeDate($var)
{
    $sanitized = strtotime($var) ? "'" . date('Y-m-d', strtotime($var)) . "'" : 'null';
//    echo $sanitized;
//    exit;
    return $sanitized;
}

function sanitizeString($var, $length)
{
//    return 'null';
    if ($var == '' || $var == 'null') {
        return 'null';
    } else {
        $sanitized = htmlspecialchars($var);
        $sanitized = strip_tags($sanitized);
        $sanitized = $length > 0 ? substr($sanitized, 0, $length) : $sanitized;
        return "'" . $sanitized . "'";
    }
}


function sanitizeNumber($var)
{
    $sanitized = intval($var);
    return ("'" . $sanitized . "'");
}