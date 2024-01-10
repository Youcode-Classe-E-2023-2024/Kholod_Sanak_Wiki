<?php
class Wiki {
    function addWiki($title, $content, $tags, $category, $creator, $created_date) {
        global $db;
        try {
            $sql = "INSERT INTO wiki (title, description, cat_id, creator_id, created_at, status) VALUES (:title, :content, :category, :creator, :created_date, 'published')";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':creator', $creator);
            $stmt->bindParam(':created_date', $created_date);
            $stmt->execute();
            $wikiId = $db->lastInsertId();

            foreach ($tags as $tag) {
                Tag::wiki_tag($tag, $wikiId);
            }

            return true;
        } catch (PDOException $e) {

            return false;
        }
    }



    function updateWiki($wiki_id, $tags, $title, $content, $category, $creator, $updated_date) {
        global $db;

        $sql = "UPDATE wiki SET title = :title, description = :content, cat_id = :category_id, creator_id = :creator, updated_at = :updated_date WHERE wiki_id = :wiki_id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':creator', $creator);
        $stmt->bindParam(':updated_date', $updated_date);
        $stmt->bindParam(':wiki_id', $wiki_id);

        $stmt->execute();

        foreach ($tags as $tag) {
            Tag::update_wiki_tag($tag, $wiki_id);
        }

        return "success";
    }


    function deleteWiki($wiki_id) {
        global $db;
        $sql = "DELETE FROM wiki WHERE wiki_id = :wiki_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':wiki_id', $wiki_id);
        $success= $stmt->execute();
        return $success;
    }


    function archiveWiki($wikiId) {
        global $db;

        $sql = "UPDATE wiki SET status = 'archived' WHERE wiki_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $wikiId, PDO::PARAM_INT);
        $success= $stmt->execute();
        return $success;
    }


    function getWikis() {
        global $db;
        $sql = "SELECT * FROM wiki WHERE status = 'published'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getAllWikis(){
        global $db;
        $sql= "SELECT * FROM wiki ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getArchivedWikis() {
        global $db;
        $sql = "SELECT * FROM wiki WHERE status = archived";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}