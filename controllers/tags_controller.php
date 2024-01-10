<?php
// Handle the AJAX requests
if (isset($_POST["action"])) {
    $tagmodel = new Tag();

    if ($_POST["action"] === "getTags") {
        $tags = $tagmodel->getTags();
        echo json_encode($tags);
        exit;
    } elseif ($_POST["action"] === "delete") {
        $tagId = $_POST["TagId"];
        $result = $tagmodel->deleteTag($tagId);
        if ($result) {
            echo "success";
            exit;
        } else
            exit;
    }
}
