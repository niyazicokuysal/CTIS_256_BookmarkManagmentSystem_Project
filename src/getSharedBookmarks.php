<?php

    require "db.php";

    $currentUserId = $_SESSION["user"]["id"];

    if (filter_var($currentUserId, FILTER_VALIDATE_INT) === "FALSE") {
        echo json_encode(["error" => "invalid id"]);
    } else {
        try {
            $sql = "select * from sharedBookmark where userId = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$currentUserId]);
            if ($stmt->rowCount() > 0) {
                echo json_encode($stmt->rowCount());
            } else {
                echo json_encode(["error" => "id not found"]);
            }
        } catch(PDOException $ex) {
            echo json_encode(["error" => "someting wrong with query"]);
        }
    }