<?php
 
if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    require "db.php";

    extract($_POST) ;

     $stmt = $db->prepare("select * from user where email = ?") ;
     $stmt->execute([$email]) ;
     if ( $stmt->rowCount() == 1) {
         $user = $stmt->fetch(PDO::FETCH_ASSOC) ;
         if ( password_verify($password, $user["password"])) {
             // success part
             $_SESSION["user"] = $user ;
             print_r($_SESSION["user"]);
             header("Location: main");
             exit ;
         }
     } 

    addMessage("Login Failed!");
    header("Location: loginForm") ;
    exit ;
}

