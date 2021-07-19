<?php

    $db = new SQLite3('project.db');

    session_start();
    
    $email = "";
    $age = "";
    $meth1 = ""; 
    $meth2 = "";
    $gender = "";
    $role = "";
    $name = "";
    $user = "";
    $passW = "";
    $passWC = "";

    $error = FALSE;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
          $error = TRUE;
          $_SESSION['errorMessage'] = "Email is required";
          header('Location: registration.php');
        }
        /*else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $error = TRUE;
            $_SESSION['errorMessage'] = "Invalid email format";
            header('Location: registration.php');
        }*/else
          $email = test_input($_POST["email"]);
          
        if (empty($_POST["age"])) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "Age is required";
            header('Location: registration.php');
        } 
        else 
          $age = test_input($_POST["age"]);
        
        if (empty($_POST["meth1"]) && empty($_POST["meth2"])) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "At least one travel method is required";
            header('Location: registration.php');
        } 
        if (empty($_POST["meth1"]))
          $meth1 = "N/A";
        else
          $meth1 = test_input($_POST["meth1"]);
        if (empty($_POST["meth2"]))
          $meth2 = "N/A";
        else
          $meth2 = test_input($_POST["meth2"]);
      
        if (empty($_POST["gender"])) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "Gender is required";
            header('Location: registration.php');
        } 
        else
          $gender = test_input($_POST["gender"]);
      
        if (empty($_POST["name"])) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "Name is required";
            header('Location: registration.php');
        } 
        else
          $name = test_input($_POST["name"]);

        if (empty($_POST["uId"])) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "User Identification is required";
            header('Location: registration.php');
        }
        else
          $user = test_input($_POST["uId"]);

        if (empty($_POST["pasW"]) || empty($_POST["pasW2"])) {
          $error = TRUE;
          $_SESSION['errorMessage'] = "Both Password and Password Confirmation are required";
          header('Location: registration.php');
        }
        else if ($_POST["pasW"] != $_POST["pasW2"]) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "Both Password and Password Confirmation are required to match";
            header('Location: registration.php');
        }
        else /*if(!preg_match("/^[ A-Za-z0-9!@#$%^&*]*$/", $passW))
          $error = TRUE;
          $_SESSION['errorMessage'] = "Password format is wrong, please try again";
          header('Location: registration.php');}
          else*/
          $passW = test_input($_POST["pasW"]);
          //$passWC = test_input($_POST["pasW2"]);
        }
      
    if($error == FALSE) {
    $_SESSION['success'] = "Registration Complete";
    $hashPass = password_hash($passW, PASSWORD_DEFAULT);
    
    $stmt = $db->prepare('INSERT INTO users VALUES (:email, :age, :meth1, :meth2, :gender, :uRole, :uName, :user, :passW)');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':meth1', $meth1);
    $stmt->bindParam(':meth2', $meth2);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':uRole', $role);
    $stmt->bindParam(':uName', $name);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':passW', $hashPass);
    $result = $stmt->execute();

    $stmt->clear();
    $stmt->reset();
    $stmt->close();

    $res = $db->query("SELECT * FROM users");
    /*while (($row = $res->fetchArray(SQLITE3_ASSOC))) {  //Debug output
      var_dump($row);
    }*/
    
    header('Location: index.php');
    $db->close();

    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>