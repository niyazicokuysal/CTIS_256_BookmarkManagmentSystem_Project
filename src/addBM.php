<?php
require "db.php" ;
//var_dump($_POST);
if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    print_r($_POST);
    $sql = "insert into bookmark (title, url, note, owner, category) values (?,?,?,?,?)" ;
    try{
      $stmt = $db->prepare($sql) ;
      $stmt->execute([$title, $url, $note, $owner, $category ?? ""]) ;
      addMessage("Success") ;
    }catch(PDOException $ex) {
       addMessage($ex->getMessage());
    }
}

 header("Location: main") ;
 exit;

