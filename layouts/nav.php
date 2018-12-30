<!-- navbar-fixed-top-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">PHP</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="<?php if ($_GET['task'] == 'home') echo 'active'; ?>">
                <a href="<?php echo URL_PATH; ?>/index.php?task=home">Home</a>
            </li>
            <li>
                <a href="<?php echo URL_PATH; ?>/index.php?task=login&method=doLogout">Logout<?php //echo ' ' . $_SESSION['fullname']; ?></a>
            </li>
        </ul>
    </div>
</nav>
<div class="clearfix" style="padding-bottom: 0px;"></div>