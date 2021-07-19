<?php

  $db = new SQLite3('project.db');

  session_start();
    
  $event = "";
  $sponsor = "";
  $desc = ""; 
  $date = "";
  $time = "";
    
  $error = FALSE;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["event"])) {
          $error = TRUE;
          $_SESSION['errorMessage'] = "Event name is required";
          header('Location: new_event.php');
        } 
        else
          $event = test_input($_POST["event"]);
      
        if (empty($_POST["sponsor"])) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "Sponsor name is required";
            header('Location: new_event.php');
        } 
        else
          $sponsor = test_input($_POST["sponsor"]);
      
        if (empty($_POST["descr"])) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "Description is required";
            header('Location: new_event.php');
        }
        else
          $desc = test_input($_POST["descr"]);
      
        $d = date("Y-m-d");
        if (empty($_POST["date"])) {
            $error = TRUE;
            $_SESSION['errorMessage'] = "Date is required";
            header('Location: new_event.php');
        }
        else if ($_POST["date"] < $d){
            $error = TRUE;
            $_SESSION['errorMessage'] = "Date must be after current date";
            header('Location: new_event.php');
        }
        else
          $date = test_input($_POST["date"]);
      
    if($error == FALSE) {
    $_SESSION['success'] = "Success";

    $stmt = $db->prepare('INSERT INTO events VALUES (:eventName, :sponsor, :dateNTime, :descr)');
    $stmt->bindParam(':eventName', $event);
    $stmt->bindParam(':sponsor', $sponsor);
    $stmt->bindParam(':dateNTime', $date);
    $stmt->bindParam(':descr', $desc);
    $result = $stmt->execute();

    $stmt->clear();
    $stmt->reset();
    $stmt->close();

    $res = $db->query("SELECT * FROM events");
    while (($row = $res->fetchArray(SQLITE3_ASSOC))) {
      var_dump($row);
    }
    header('Location: events.php');
    $db->close();
    }

    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>