<?php 
require 'header.php';
if(session_id() == '' || !ISSET($_SESSION)) {
    session_start();
 }

/*if( isset($_SESSION['logMess'])) {
    echo ($_SESSION['logMess']);
    echo ($_SESSION['logged_in']); //debug output
    unset($_SESSION['logMess']);
    }*/
?>
<body>
    <div id="menu"> <?php require 'menu.php'; ?> </div>
    <div id="about">
        <div class="aImg">
            <img class="mySlides" alt="Construction" src="resources/images/about.webp">
            <img class="mySlides" alt="Construction" src="resources/images/about3.webp">
            <img class="mySlides" alt="Construction" src="resources/images/about3.webp">
            <img class="mySlides" alt="Construction" src="resources/images/about3.webp">
        </div>
    

    <p id="bigA">About Us</p>
    <h3>Our Mission</h3>
    <p>
        This organization's mission is to provide both education and hands-on experience to those interested in the 
        world of the blue-collar workforce. We believe that many young men and women who enjoy working with their hands 
        miss out on the fulfilling experience of erecting physical objects from the ground up. We aim to provide a place 
        for these individuals to express what they are interested in and what they hope to gain while giving them access 
        to a library of opportunities. There will be some educational reading and watching material to kickstart this 
        process; however, the hands-on approach is king.  
    </p>
    <h3>Our Goal</h3>
    <p>
        Our initial goal when starting this organization was to help build the numbers of the much needed blue collar
        workforce. Upon helping young men and women gain experience in something that they loved to do we developed 
        an equally important sub-goal. We are also looking to help people get the experience developed on a blue collar
        worksite because we believe these skills will be helpful in all real world situations.
    </p>
    <h3>Location</h3>
    <p>
        Our offices are located in the heart of Virginia but we operate all over the state. We hope to one day reach 
        out and help young men and women all over the United States.
    </p>
    <h3>Organization Leaders</h3>
    <p>
        This organization is lead by Aaron Reynolds, Judy Smothleshburg, Gordon Freeman and Jason Vorhees. We are 
        all blue collar veterans that know first hand the importance of the blue collar workforce and the skills 
        developed on the worksite in the real world.
        <br>
    </p>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000);    
}
</script>
</body>
</html>