<?php

$sharedBookmarks = $db->query("select * from sharedBookmark where sharedbmId.userid = {$_SESSION["user"]["id"]}")->fetchAll(PDO::FETCH_ASSOC) ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    foreach( $sharedBookmarks as $bm) {
        $bm["category"] = $category;
    }
}


header("Location: main"); exit;