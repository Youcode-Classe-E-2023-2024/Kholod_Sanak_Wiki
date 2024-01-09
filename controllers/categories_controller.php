<?php
//$category = new Category();
//$categories = $category->getCategories();
//if (isset($_POST["categories"])) {
//echo json_encode($categories);
//exit;
//}
//
//
// Handle the AJAX requests
if (isset($_POST["action"])) {
    $category = new Category();

    if ($_POST["action"] === "getCategories") {
        $categories = $category->getCategories();
        echo json_encode($categories);
        exit;
    } elseif ($_POST["action"] === "delete") {
        $categoryId = $_POST["categoryId"];
        $result = $category->deleteCategory($categoryId);
        if ($result) {
            echo "success";
            exit;
        } else
            exit;
    }
}

