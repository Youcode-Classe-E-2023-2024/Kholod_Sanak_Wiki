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

/////////////////////////          search
if (isset($_GET["input_value"]) && isset($_GET["search_type"])) {
    $input_value = $_GET["input_value"];
    //dd($input_value);
    $searchType = $_GET["search_type"];
    //dd($searchType);
    $searchArray = [];
    $searchedData = [];
    $searchedData = Wiki::searchForTitles($input_value);
    //dd($searchedData);

    if ($searchType === "title") {
        $searchedData = Wiki::searchForTitles($input_value);
        //var_dump($searchedData);
    } elseif ($searchType === "tag") {
        $searchedData = Wiki::searchForTags($input_value);
    } elseif ($searchType === "category") {
        $searchedData = Wiki::searchForCategory($input_value);

    }

    if ($searchedData !== null) {
        foreach ($searchedData as $data) {
            $wikiTags = Tag::get_wiki_tag($data["wiki_id"]);

            $searchArray[] = [
                "tags" => $wikiTags,
                "wiki_infos" => $data
            ];
        }
    }

    echo json_encode($searchArray);
    exit;
}


//if (empty($_SESSION['user_id'])) {
//    header('location: index.php?page=home');
//}


