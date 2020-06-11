<?php
   
   print_r($_SESSION["user"]);
   require "db.php";

    if (!isset($_FILES["user_profile"])) { // there is no uploaded file
        $invalid = "No file";
        echo "profile image is not set";
    } else {
        $imageName = $_FILES["user_profile"]["name"];
        $size = $_FILES["user_profile"]["size"];
        $tmp_file = $_FILES["user_profile"]["tmp_name"];

        $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $validList = ["jpg", "gif", "png", "jpeg", "bmp"];

        if (!in_array($extension, $validList)) {
            $invalid = "Extension is not valid";
        }

        // if (!preg_match("/^[\w.]+$/u", $imageName)) {
        //     $invalid = "Image name is invalid";
        // }

        $hashedImageName = sha1($_SESSION["user"]["name"] . uniqid() . "_" . $imageName);
        

        if (!isset($invalid) && move_uploaded_file($tmp_file, "../public/img/$hashedImageName")) {
            $success = "true";
        }
    }

    if (strlen($_POST["password"]) > 0 && strlen($_POST["password_confirm"]) > 0 && ($_POST["password"] == $_POST["password_confirm"])) {
        if (password_verify($_POST["password_current"], $_SESSION["user"]["password"])) {
            $pw = $_POST["password"];
            $hash_password = password_hash($pw, PASSWORD_DEFAULT) ;
            $_SESSION["user"]["password"] = $hash_password;
        } else {
            addMessage("Something wrong with password");
            header("Location: editProfile");
            exit;
        }
    }else{
        $hash_password = $_SESSION["user"]["password"];
    }
    
    try {

        $sql = "update user set name = ?, email = ?, password = ?, bday = ?";
        if (isset($success)) {

            $name = $_POST["name"]; 
            $email = $_POST["email"]; 
            // $bday = $_POST["bday"]; 

            $_SESSION["user"]["profile"] = $hashedImageName;
            // $sql = "UPDATE user SET name = ?, email = ?, password = ?, profile = ? WHERE user.id = ?";
            $sql .= ", profile = ? WHERE user.id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$name, $email, $hash_password, $bday, $hashedImageName, $_SESSION["user"]["id"]]);

        } else {

            extract($_POST);
            $sql .= "WHERE user.id = ?"; 
            $stmt = $db->prepare($sql);
            $stmt->execute([$name, $email, $hash_password, $bday, $_SESSION["user"]["id"]]);

        }
        $_SESSION["user"]["name"] = $name;
        $_SESSION["user"]["bday"] = $bday;
        $_SESSION["user"]["email"] = $email;

        addMessage("User settings edited");
        header("Location: main");
        exit;

    } catch(PDOException $ex) {
        addMessage("User editing failed");
        echo $ex->getMessage();
        header("Location: editProfile");
        exit;
    }
   
