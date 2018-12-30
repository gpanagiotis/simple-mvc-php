<?php require FILE_PATH . '/layouts/header.php'; ?>

<?php
$data = $model->getData();
?>

<div class="container">
    <h1>home</h1>
    <p><?= $data; ?></p>
</div>


</body>


</html>