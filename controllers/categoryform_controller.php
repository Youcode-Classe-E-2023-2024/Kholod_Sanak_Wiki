<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $category = new Category(); // Assuming Category class is defined somewhere

    // Adding a new category
    if (isset($_POST["action"]) && $_POST["action"] === "add") {
        $title = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        if ($title !== null && $title !== false && preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $result = $category->addCategory($title);

            if ($result) {
                echo "Category added successfully";
                exit;
            } else {
                echo "Failed to add Category";
                exit;
            }
        } else {
            echo "Please enter a valid Category title";
            exit;
        }
    }
    // Updating an existing category
    elseif (isset($_POST["action"]) && $_POST["action"] === "update") {
        $categoryId = $_POST["categoryId"];
        $cat = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        var_dump($cat);
        $result = $category->updateCategory($categoryId, $cat);

        if ($result) {
            echo "Category updated successfully";
            exit;
        } else {
            echo "Failed to update category. Please check your data and try again.";
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
