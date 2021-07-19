<div class=lImg><img src="resources/images/logo.png" alt="logo" height="36" width="36"></div>
<h1>BLUE HANDS ON DECK</h1> 

<div class="navMenu">
  <a class="home" href="index.php"><img src="resources/images/home.png" align:"center" width="24" height="24"></a>
  <a href="about.php">About</a>
  <a href="events.php">Events</a>
  <a href="contact.php">Contact</a>
  <?php
    if(ISSET($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1)
      echo "<a href=\"logout_action.php\">Logout</a>";
    else{
      echo "<a href=\"registration.php\">Register</a>";
      echo "<a href=\"login.php\">Login</a>";
    }
  ?>
  
</div>

