<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["logout"])) {
        $user = new User();
        $user->logout();
    }
}
