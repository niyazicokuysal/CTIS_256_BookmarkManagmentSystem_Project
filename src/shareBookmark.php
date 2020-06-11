<?php

    
    print_r($_POST);

    require "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["users"])) {
        extract($_POST);
        try {
            foreach($users as $userId){
                echo $userId;
                $sql = "INSERT INTO sharedBookmark (sharedbmId, userId) VALUES (?, ?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$bid, $userId]);
               
                addMessage("Bookmark is shared");
                header("Location: main");
                exit;
            }            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            addMessage("Something wrong");
            header("Location: main");
            exit;
        }
    } 
