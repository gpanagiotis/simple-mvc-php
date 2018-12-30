<?php require(FILE_PATH . '/layouts/header.php'); ?>
    <h2>Login</h2>
<?php
if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
    <form action='<?php echo URL_PATH; ?>/index.php?task=login&method=doLogin' method='post'>
        Username
        <input type='text' name='username'/><br>
        Password
        <input type='password' name='password'/><br>
        <input type='submit' value="Login">
    </form>
<?php require(FILE_PATH . '/layouts/footer.php'); ?>