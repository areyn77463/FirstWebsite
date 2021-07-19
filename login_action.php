<?php

    $db = new SQLite3('project.db') or die($db);

    session_start();

    $username = '';
    $password = '';

    if((!empty($_POST['uId'])) && !empty($_POST['pasW'])){
        $username = $_POST['uId'];
        $password = $_POST['pasW'];

        $username = test_input($username);
        $password = test_input($password);

        $hash = $db->querySingle("SELECT passW FROM users WHERE user = '$username'");
        $valid = password_verify($password, $hash);
        
        if($valid){
            $_SESSION['user'] = $username;
            $_SESSION['logged_in'] = true;
            $_SESSION['logMess'] = $username . " Login Successful!"; // Value: "; debug output
            header('Location: index.php');
        }else{
            $_SESSION['user'] = NULL;
            $_SESSION['logged_in'] = false;
            $_SESSION['logMess'] = "Login Unsuccessful!";
            header('Location: login.php');
    }
    }else if((empty($_POST['uId'])) && empty($_POST['pasW'])){
        $username = NULL;
        $password = NULL;
        $_SESSION['user'] = NULL;
        $_SESSION['logged_in'] = false;
        $_SESSION['logMess'] = "Login Unsuccessful. Need Username and Password!";
        header('Location: login.php');  
    }else if(empty($_POST['uId'])){
        $username = NULL;
        $_SESSION['user'] = NULL;
        $_SESSION['logged_in'] = false;
        $_SESSION['logMess'] = "Login Unsuccessful. Need Username!";
        header('Location: login.php');
    
    }else if(empty($_POST['pasW'])){
        $password = NULL;
        $_SESSION['user'] = NULL;
        $_SESSION['logged_in'] = false;
        $_SESSION['logMess'] = "Login Unsuccessful. Need Password!";
        header('Location: login.php');  
    }
    
    //testing and debugging
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['uId'];
		$password = $_POST['pasW'];

        $query = $db->querySingle("SELECT passW FROM users WHERE user = '$username'");
        //$hash = $query->fetchArray(SQLITE3_ASSOC);
        $valid = password_verify($password, $query);
            
            echo "<br> Valid: " . $valid;
            echo "<br> Hash: " . $query;
            echo "<br> pass: " . $password;

            if($valid)
                echo "<br>" . "Password Valid";
    }*/

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>