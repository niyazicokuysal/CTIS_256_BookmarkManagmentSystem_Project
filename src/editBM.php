 <?php

require "db.php";

  $bid = $_GET["bid"];
  extract($_POST);

try {
    $sql = "UPDATE bookmark SET title=?, url=?, note=?, category=? where bookmark.id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$title, $url, $note, $category, $bid]);
    addMessage("Bookmark is edited");

} catch(PDOException $ex) {
    addMessage($ex->getMessage());
    echo $ex->getMessage();
}

 header("Location: main");
 exit;
