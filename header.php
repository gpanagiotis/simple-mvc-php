<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>simple-mvc | PHP</title>
    <meta name="description" content="This is an example.">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_PATH . '/css/site.css'; ?>">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- Latest compiled and minified CSS wenzhixin -->
    <link rel="stylesheet" href="<?php echo URL_PATH; ?>/node_modules/bootstrap-table/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous">
    <!-- Date Time Picker -->
    <link rel="stylesheet"
          href="<?php echo URL_PATH; ?>/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
</head>

<body>


  
<?php
if (isset($_SESSION['is_user_logged']) && $_SESSION['is_user_logged'] = 1) {
    require FILE_PATH . '/layouts/nav.php';
}
?>