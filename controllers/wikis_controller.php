<?php

// Handle the AJAX requests
if (isset($_POST["action"])) {
    $wikiModel = new Wiki();

    if ($_POST["action"] === "getWikis") {
        if (isset($_SESSION["admin"])){
            $wikis = $wikiModel->getAllWikis();
            echo json_encode($wikis);
            exit;
        }else{
            $wikis = $wikiModel->getWikis();
        echo json_encode($wikis);
        exit;}
    } elseif ($_POST["action"] === "delete") {
        $wikiId = $_POST["wikiId"];
        $result = $wikiModel->deleteWiki($wikiId);
        if ($result) {
            echo "success";
            exit;
        } else
            exit;
    } elseif ($_POST["action"] === "archive") {
        $wikiId = $_POST["wikiId"];
        $result = $wikiModel->archiveWiki($wikiId);
        if ($result) {
            echo "success";
            exit;
        } else
            exit;
    }
}
