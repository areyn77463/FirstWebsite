<?php require 'header.php'; 

if(session_id() == '' || !ISSET($_SESSION)) {
    session_start();
 }

/*if( isset($_SESSION['logMess'])) {
    echo ($_SESSION['logMess']);
    echo ($_SESSION['logged_in']); // debug output
    unset($_SESSION['logMess']);
    }*/
?>
<body>
    <div id="menu"> <?php require 'menu.php'; ?> </div> 
    <div class = "over">
    <img class="blueP" src="work.jpg" alt="Bench" style="width:52% ">
    <div class="outer">
        <h2>Contact Us</h2>
        <div class="contac">
       
        <h4>Office Hours</h4>
        <p>Monday–Friday 7:00 AM to 4:00PM <br>
            Heart of Virginia <br>
            (555) 671-0921
            </p>
        <h4>Gordon Freeman</h4>
        <p> Web Help <br>
            (555) 789-3245</p>
        <h4>Jason Vorhees</h4>
        <p> Project Management <br>
            (555) 986-4958)</p>
        <h4>Email: </h4>
        <p>BHOD757@gmail.com <br></p>
    </div>

    <div class="message">
        <p>You can show up to our office for all inquiries and questions during our office hours listed.
        If you need help navigating the web page or anything web based pleased call Mr. Freeman for assistance.
        He will be available during our normal office hours. For help with a project please contact Mr. Vorhees, 
        also available during normal office hours. For anything at all feel free to use the email address provided.
        You can email at any time but know we may not be able to get back to you for up to 12 hours. Mr. Reynolds and
        Ms. Smothleshburg will handle all incoming Emails.</p>
    </div>
</div>
</div>
    </body>
</html>
