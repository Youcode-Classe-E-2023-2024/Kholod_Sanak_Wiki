<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $logname = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $logemail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $logpass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = password_hash($logpass, PASSWORD_DEFAULT);
    $user= new User();

    $userChecker = $user->CheckUser($logemail, $db);
    if ($userChecker) {
                echo "User exist";
                exit;
            } else {
                echo "success";
                $user->AddUser($logemail, $password, $logname,  $db);
                $user->updateUserRole($db);

//                header("Location: index.php?page=login");
                exit;
            }
        }


    // Check if the profile picture is uploaded
//    if (isset($_FILES['profile_picture'])) {
//        $targetDir = "./assets/img/";
//        $fileName = basename($_FILES["profile_picture"]["name"]);
//        $targetFilePath = $targetDir . $fileName;
//        // Move the uploaded file to the desired directory
//        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
//            // Check if the user already exists
//            $userChecker = $user->CheckUser($logemail, $db);
//
//            if ($userChecker) {
//                echo "User exist";
//                exit;
//            } else {
//
//                $user->AddUser($logemail, $password, $logname, $fileName, $db);
//                $user->updateUserRole($db);
//
////                header("Location: index.php?page=login");
//                exit;
//            }
//        } else {
//            echo "File_upload_failed";
//            exit;
//        }
//    }
