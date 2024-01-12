<?php

class Search
{
    static function searchForTitles($title)
    {
        global $db;
        $title = "%" . "$title" . "%";
        $sql = "SELECT wiki.*, category.* FROM wiki
                JOIN category ON wiki.cat_id = category.category_id
                WHERE title LIKE :title AND wiki.status = 'published'";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    static function searchForTags($tag)
    {
        global $db;
        $tag = "%" . "$tag" . "%";
        $sql = "SELECT DISTINCT wiki.*, category.*
                FROM wiki_tag
                         JOIN wiki ON wiki_tag.wiki_id = wiki.wiki_id
                         JOIN tag ON wiki_tag.tag_id = tag.tag_id
                         JOIN category ON wiki.cat_id = category.category_id
                WHERE tag.tag LIKE :tag AND wiki.status = 'published'";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    static function searchForCategory($category)
    {
        global $db;
        $category = "%" . "$category" . "%";
        $sql = "SELECT category.*, wiki.* FROM wiki
                JOIN category ON wiki.cat_id = category.category_id
                WHERE category.category LIKE :category AND wiki.status = 'published' ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":category", $category, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}