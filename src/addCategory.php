<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    $sql = "insert into category (name) values (?)";
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute([$category]);
        addMessage("Category Added");
    } catch (PDOException $ex) {
        addMessage("Adding Failed");
    }
}
header("Location: main");