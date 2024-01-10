<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $wikiModel = new Wiki();

    // Adding a new Wiki
    if (isset($_POST["action"]) && $_POST["action"] === "add") {
        $wikiTitle = filter_input(INPUT_POST, 'Wiki', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $tags = isset($_POST['tags']) ? $_POST['tags'] : [];
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $userId = $_SESSION["user_id"];

        if (!empty($wikiTitle) && !empty($description)) {
            $result = $wikiModel->addWiki($wikiTitle, $description, $tags, $category, $userId,date('Y-m-d H:i:s'));

            if ($result) {
                echo "Wiki added successfully";
                exit;
            } else {
                echo "Failed to add Wiki";
                exit;
            }
        } else {
            echo "Please enter a Wiki title and description";
            exit;
        }
    }

    // Archiving Wiki
    elseif (isset($_POST["action"]) && $_POST["action"] === "update") {
        $wikiId = $_POST["wikiId"];
        $wikiTitle = filter_input(INPUT_POST, 'updatedWiki', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'updatedCategory', FILTER_SANITIZE_STRING);
        $tags = isset($_POST['updatedTags']) ? $_POST['updatedTags'] : [];
        $description = filter_input(INPUT_POST, 'updatedDescription', FILTER_SANITIZE_STRING);
        $userId = $_SESSION["user_id"];

        if (!empty($wikiTitle) && !empty($description)) {

            $result = $wikiModel->updateWiki($wikiId ,$tags,$wikiTitle,$description,$category,$userId,date('Y-m-d H:i:s'));
        if ($result === "success") {
            echo "Wiki updated successfully";
            exit;
        } else {
            echo "Failed to update Wiki. Please check your data and try again.";
            exit;
        }
        }else {
            echo "Please enter a Wiki title and description";
            exit;
        }
    }
    else {
        echo "Invalid action";
        exit;
    }
} else {
    echo "Invalid request method";
    exit;
}
?>
<?php
