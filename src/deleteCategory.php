<?php 
    require "db.php";
    $categoryName = $_GET["category"];

    try {
        $message = "";
        $stmt = $db->prepare("DELETE FROM category WHERE name = ?");
        $stmt->execute([$categoryName]);
        $stmt = $db->prepare("DELETE FROM bookmark WHERE category = ?");
        $stmt->execute([$categoryName]);
        if($stmt->rowCount() > 0){
            $message = "Category and its related bookmarks deleted";
        } else {
            $message = "Category deleted";
        }
        addMessage($message);
    } catch(PDOException $ex) {
        echo $ex->getMessage();
        addMessage("Category deletion failed");
    }

    header("Location: main");
    exit;