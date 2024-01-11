<?php


$wikiModel = new Wiki();
$categoryModel = new Category();
$tagModel = new Tag();


$wikisNumber = $wikiModel->getWikisCount();
$categoriesNumber = $categoryModel->getCategoriesCount();
$tagsNumber = $tagModel->getTagsCount();

$data = array(
    'wikis' => $wikisNumber,
    'categories' => $categoriesNumber,
    'tags' => $tagsNumber
);
$jsonData = json_encode($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["logout"])) {
        $user = new User();
        $user->logout();
    }
}
if (empty($_SESSION['user_id'])) {
    header('location: index.php?page=login');
}
