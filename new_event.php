<?php require 'header.php'; 
if(session_id() == '' || isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['errorMessage'])) {
    echo($_SESSION['errorMessage']);
    unset($_SESSION['errorMessage']);
}

/*if( isset($_SESSION['logMess'])) {
    echo ($_SESSION['logMess']);
    echo ($_SESSION['logged_in']); // debug output
    unset($_SESSION['logMess']);
    }*/
if($_SESSION['logged_in'] == NULL)
    header('Location: index.php');
?>
<body>
    <div id="menu"> <?php require 'menu.php'; ?> </div> 
    <br><br><br><br>
    
    <div class="signup">
    <form method="POST" action="new_event_action.php">
        <label for="event">Event:</label>
        <input type="text" id="event" name="event" required><br><br>

        <label for="sponsor">Sponsor:</label>
        <input type="text" id="sponsor" name="sponsor" required><br><br>
        
        <label for="date">Date and Time:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="descr">Description:</label> <br>
        <textarea id="descr" name="descr" rows="4" cols="50" required></textarea><br><br>


        <input type="submit" value="Submit" onClick="timeCheck()"><br>
    </form>
    </div>
<script type="text/javascript">
    function timeCheck() {
        var current = new Date();
        var dateS = document.getElementById("date").value;
        var input = new Date(dateS);
        if(input < currentTime){
            alert(Date or time before current date or time);
        }
    }
</script>
    </body>
</html>
