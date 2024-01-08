<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $logname = filter_input(INPUT_POST, 'logname', FILTER_SANITIZE_STRING);
    $logemail = filter_input(INPUT_POST, 'logemail', FILTER_SANITIZE_EMAIL);
    $logpass = filter_input(INPUT_POST, 'logpass', FILTER_SANITIZE_STRING);
    $password = password_hash($logpass, PASSWORD_DEFAULT);

    $user= new User();

    // Check if the profile picture is uploaded
    if (isset($_FILES['profile-picture'])) {
        $targetDir = "./assets/img/";
        $fileName = basename($_FILES["profile-picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $targetFilePath)) {
            // Check if the user already exists
            $userChecker = $user->CheckUser($logemail, $db);

            if ($userChecker) {
                echo "User exist";
            } else {

                $user->AddUser($logemail, $password, $logname, $fileName, $db);
                $user->updateUserRole($db);

                header("Location: index.php?page=login");
                exit();
            }
        } else {
            echo "File_upload_failed";
        }
    }
}