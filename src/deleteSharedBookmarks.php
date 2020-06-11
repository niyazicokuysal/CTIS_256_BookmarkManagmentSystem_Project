<?php

sleep(5);
require "db.php";
$currentUserId = $_SESSION["user"]["id"];

try {
    $stmt = $db->prepare("DELETE FROM sharedBookmark where userId = ?");
    $stmt->execute([$currentUserId]);
    echo json_encode(["status" => "ok", "message" => "$currentUserId 's bookmarks are deleted"]);
} catch(PDOException $ex) {
    echo json_encode(["status" => "error", "message" => "query error"]);
}