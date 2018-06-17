<?php
    session_start();
    require_once('model/login_model.php');
    require_once('controller/login.php');
    $mess = isset($_GET['mess']) ? trim($_GET['mess']) : '';
    require_once('view/login_view.php');
?>