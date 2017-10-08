<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "../model/config.php";

//if (isset($_POST['user_id']) && $_POST['user_id'] == "admin") {
    try {
        $pdo = connect();
        $admin = "admin";
        $protected_ap = 1;
        $stmt = $pdo->prepare("DELETE FROM adkap WHERE apartment_id <> ?");
        $stmt->execute(array($protected_ap));
        header("location: ../view/admin.php");
    }
    catch (PDOException $e) {
        echo "Pdo error clear: ". $e->getMessage();
        exit();
    }
//}