<?php 
require 'header.php'; 
if(session_id() == '' || !isset($_SESSION)) {
   session_start();
}
   
if( isset($_SESSION['success'])) {
echo ($_SESSION['success']);
unset($_SESSION['success']);
}

if( isset($_SESSION['logMess'])) {
   echo ($_SESSION['logMess']);
   //echo ($_SESSION['logged_in']); //debug output
   unset($_SESSION['logMess']);
   }
?>
<body>
    <div id="menu"> <?php require 'menu.php'; ?> </div> 
    <div id="info">
     <h3 style="text-align:right;">Looking to get into blue collar? Give us a holler</h3>
    <div class="hImg"><img src="resources/images/house.webp" alt="Bedford Barn" height="430" width="500"></div>
    <h2>Welcome</h2>
    <p>
       Welcome to the Blue Hands on Deck Organization home page. If you are 
       looking to get into the blue collar workforce and have little to no 
       experience, you are in the right place.
    </p> 
       <h2>What can we do for you?</h2>
     <p>  
        From large projects that can last almost a year to smaller and shorter
        jobs, we can find a fit for you.
     </p>   
        <h2>Who are we looking for?</h2>
     <p>   
        Newcomers, experienced blue collar workers, and those that would like to support
        our mission are all welcome to join or support our organization!
     </p>   
        <h2>Why support us?</h2>
     <p>   
        Studies show that the amount of blue collar workers is dropping even though This
        profession can require you to be highly educated. Even with the promise of job
        security and high wages the numbers decline. The blue collar workforce is an 
        essential part of society and we believe we need to do something to help.
        Can you help us?  
    </p>
    </div>

       
   
</body>
</html>
