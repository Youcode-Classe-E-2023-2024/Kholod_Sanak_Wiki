<?php
if (isset($_GET["wiki_id"]) && isset($_GET["action"])) {

    $wikiModel = new Wiki();
    $wikiId = $_GET['wiki_id'];

    if ($_GET["action"] === "Content") {
        $wiki = $wikiModel->displayWiki($wikiId);
        echo json_encode($wiki);
        exit;
    }
}



