<?php require 'header.php'; 
if(session_id() == '' || !ISSET($_SESSION)) {
  session_start();
}

if( isset($_SESSION['logMess'])) {
  echo ($_SESSION['logMess']);
  //echo ($_SESSION['logged_in']); // Debug output
  unset($_SESSION['logMess']);
  }
?>
<body>
    <div id="menu"> <?php require 'menu.php'; ?> </div> 
    <br><br><br><br>
    <div class="block">
    <img class="sLeft" src="signup.png" alt="Power Tools" style="width:49%">
    <img class="sRight" src="signup.png" alt="Power Tools" style="width:49%">
    
    
    <div class="signup">
    <form method="POST" action="login_action.php">
        <label for="uId">UserID:</label>
        <input type="text" id="uId" name="uId" placeholder="User Identification" required><br><br>

        <label for="pasW">Password:</label>
        <input type="password" id="pasW" name="pasW" required><br><br>

        <input type="submit" value="Submit"><br>
    </form>
    </div>
</div>
</body>
</html>

