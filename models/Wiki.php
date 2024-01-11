<?php
class Wiki {
    /**
     * @param $title
     * @param $content
     * @param $tags
     * @param $category
     * @param $creator
     * @param $created_date
     * @return bool
     */
    public function addWiki($title, $content, $tags, $category, $creator, $created_date) {
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


    /**
     * @param $wiki_id
     * @param $tags
     * @param $title
     * @param $content
     * @param $category
     * @param $creator
     * @param $updated_date
     * @return string
     */
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


    /**
     * @param $wiki_id
     * @return bool
     */
    function deleteWiki($wiki_id) {
        global $db;
        $sql = "DELETE FROM wiki WHERE wiki_id = :wiki_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':wiki_id', $wiki_id);
        $success= $stmt->execute();
        return $success;
    }


    /**
     * @param $wikiId
     * @return bool
     */
    function archiveWiki($wikiId) {
        global $db;

        $sql = "UPDATE wiki SET status = 'archived' WHERE wiki_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $wikiId, PDO::PARAM_INT);
        $success= $stmt->execute();
        return $success;
    }


    /**
     * @return array|false
     */
    function getWikis() {
        global $db;
        $sql = "SELECT * FROM wiki WHERE status = 'published' ORDER BY wiki_id DESC ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @return array|false
     */
    function getAllWikis(){
        global $db;
        $sql= "SELECT * FROM wiki ORDER BY wiki_id DESC  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

//    /**
//     * @return array|false
//     */
//    function getArchivedWikis() {
//        global $db;
//        $sql = "SELECT * FROM wiki WHERE status = 'archived'";
//        $stmt = $db->prepare($sql);
//        $stmt->execute();
//        return $stmt->fetchAll();
//    }

    /**
     * @param $wikiId
     * @return string
     */
    public function displayWiki($wikiId){
        global $db;

        $sql = "SELECT * FROM wiki JOIN user u on u.user_id = wiki.creator_id
                WHERE wiki_id = :wiki_id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':wiki_id', $wikiId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    /**
     * @return array|false
     */
    public function getAllWikiInfo() {
        global $db;

        $sql = "SELECT wiki.*, GROUP_CONCAT(tag.tag) AS tags, category.category, user.username
            FROM wiki
            JOIN wiki_tag ON wiki.wiki_id = wiki_tag.wiki_id
            JOIN tag ON wiki_tag.tag_id = tag.tag_id
            JOIN category ON wiki.cat_id = category.category_id
            JOIN user ON wiki.creator_id = user.user_id
            WHERE wiki.status = 'published'
            GROUP BY wiki.wiki_id
            ORDER BY wiki.updated_at DESC, wiki.created_at DESC
            LIMIT 8;
            ";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }



    /**
     * @return mixed
     */
    public function getWikisCount() {
        global $db;
        $sql = "SELECT COUNT(*) as count FROM wiki WHERE status = 'published'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }




}