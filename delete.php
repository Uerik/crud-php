<?php 
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }

    require('config.php');

    $sql = "DELETE FROM clients WHERE id=$id";
    $connection->query($sql);


    header("location: /myshop/index.php");
    exit;
?>