<?php





if (isset($_GET["action"])) {
    $wikiModel = new Wiki();

    if ($_GET["action"] === "Wikis") {

        $wikiInfo = $wikiModel->getAllWikiInfo();
        //dd($wikiInfo);
        echo json_encode($wikiInfo);
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["logout"])) {
        $user = new User();
        $user->logout();
        header("Location: index.php?page=home");
        exit();
    }
}
//if (empty($_SESSION['user_id'])) {
//    header('location: index.php?page=home');
//}


