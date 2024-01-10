<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tagmodel = new Tag();

    // Adding a new Tag
    if (isset($_POST["action"]) && $_POST["action"] === "add") {
        $title = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_STRING);
        if ($title !== null && $title !== false && preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $result = $tagmodel->addTag($title);

            if ($result) {
                echo "Tag added successfully";
                exit;
            } else {
                echo "Failed to add Tag";
                exit;
            }
        } else {
            echo "Please enter a valid Tag title";
            exit;
        }
    }
    // Updating an existing tag
    elseif (isset($_POST["action"]) && $_POST["action"] === "update") {
        $tagId = $_POST["tagId"];
        $tag = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_STRING);
        //var_dump($tag);
        $result = $tagmodel->updateTag($tagId, $tag);

        if ($result) {
            echo "Tag updated successfully";
            exit;
        } else {
            echo "Failed to update Tag. Please check your data and try again.";
            exit;
        }
    } else {
        echo "Invalid action";
        exit;
    }
} else {
    echo "Invalid request method";
    exit;
}
?>
