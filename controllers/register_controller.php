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
                exit;
            }
        }

