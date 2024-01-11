<?php
class Category
{
    /**
     * @param $category
     * @return bool
     */
    public function addCategory($category)
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

    /**
     * @param $categoryId
     * @param $newCategory
     * @return bool
     */
    public function updateCategory($categoryId, $newCategory)
    {
        global $db;

        $sql = "UPDATE category SET category = :newCategory, updated_at = CURRENT_TIMESTAMP WHERE category_id = :categoryId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':newCategory', $newCategory, PDO::PARAM_STR);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

        $success = $stmt->execute();

        return $success;
    }


    /**
     * @return array|false
     */
    public function getCategories() {
        global $db;
        $sql = "SELECT * FROM category ORDER BY category_id DESC ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCategoriesCount() {
        global $db;
        $sql = "SELECT COUNT(*) as count FROM category";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    /**
     * @param $categoryId
     * @return bool
     */
    public function deleteCategory($categoryId)
    {
        global $db;

        $sql = "DELETE FROM category WHERE category_id = :categoryId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

        $success = $stmt->execute();
        return $success;
    }


}