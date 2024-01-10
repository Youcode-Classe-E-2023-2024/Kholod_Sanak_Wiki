<?php
class Tag
{
    /**
     * Add a new tag to the database.
     *
     * @param string $tag The tag to be added.
     * @return bool True if the operation was successful, otherwise false.
     */
    function addTag($tag)
    {
        global $db;
        $sql = "INSERT INTO tag (tag) VALUES (:tag)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);

        try {
            // Attempt to execute the SQL statement
            $success = $stmt->execute();
            return $success;
        } catch (PDOException $e) {

            return false;
        }
    }

    /**
     * Update an existing tag in the database.
     *
     * @param int $tagId The ID of the tag to be updated.
     * @param string $newTag The new tag value.
     * @return bool True if the operation was successful, otherwise false.
     */
    function updateTag($tagId, $newTag)
    {
        global $db;

        $sql = "UPDATE tag SET tag = :newTag, updated_at = CURRENT_TIMESTAMP WHERE tag_id = :tagId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':newTag', $newTag, PDO::PARAM_STR);
        $stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);

        try {
            $success = $stmt->execute();
            return $success;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retrieve all tags from the database.
     *
     * @return array An array of tag records.
     */
    function getTags()
    {
        global $db;
        $sql = "SELECT * FROM tag";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Delete a tag from the database.
     *
     * @param int $tagId The ID of the tag to be deleted.
     * @return bool True if the operation was successful, otherwise false.
     */
    function deleteTag($tagId)
    {
        global $db;

        $sql = "DELETE FROM tag WHERE tag_id = :tagId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);

        try {
            $success = $stmt->execute();
            return $success;
        } catch (PDOException $e) {
            return false;
        }
    }

    static function wiki_tag ($tag, $wikiId) {
        global $db;
        $sql = "INSERT INTO wiki_tag (tag_id, wiki_id) VALUES (:tag_id, :wiki_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag_id', $tag);
        $stmt->bindParam(':wiki_id', $wikiId);
        $stmt->execute();
    }

    static function update_wiki_tag ($tag) {
        global $db;
        $sql = "UPDATE wiki_tag  SET tag_id = :tag_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag_id', $tag);
        $stmt->execute();
    }
}