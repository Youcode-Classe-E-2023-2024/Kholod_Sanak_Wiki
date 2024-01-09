<?php
class Category
{
    function addCategory($category)
    {
        global $db;
        $sql = "INSERT INTO category (category) VALUES (:category)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);

        // Attempt to execute the SQL statement
        $success = $stmt->execute();

        // Return true if the execution was successful, otherwise false
        return $success;
    }

    function updateCategory($categoryId, $newCategory)
    {
        global $db;

        $sql = "UPDATE category SET category = :newCategory, updated_at = CURRENT_TIMESTAMP WHERE category_id = :categoryId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':newCategory', $newCategory, PDO::PARAM_STR);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

        $success = $stmt->execute();

        return $success;
    }




    function getCategories() {
        global $db;
        $sql = "SELECT * FROM category";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function deleteCategory($categoryId)
    {
        global $db;

        $sql = "DELETE FROM category WHERE category_id = :categoryId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

        $success = $stmt->execute();
        return $success;
    }


}