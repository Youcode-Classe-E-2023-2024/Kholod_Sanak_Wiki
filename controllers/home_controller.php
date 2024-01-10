<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["logout"])) {
        $user = new User();
        $user->logout();
        header("Location: index.php?page=");
        exit();
    }
}
//if (empty($_SESSION['user_id'])) {
//    header('location: index.php?page=home');
//}


