<?php 
require 'header.php'; 
if(session_id() == '' || ISSET($_SESSION)) {
    session_start();
}
if(isset($_SESSION['errorMessage'])) {
    echo($_SESSION['errorMessage']);
    unset($_SESSION['errorMessage']);
}

/*if( isset($_SESSION['logMess'])) {
    echo ($_SESSION['logMess']);
    //echo ($_SESSION['logged_in']); // debug output
    unset($_SESSION['logMess']);
    }*/

?>
<body>
    <div id="menu"> <?php require 'menu.php'; ?> </div> 
    <br><br><br><br>
    <div class="block">
    <img class="sLeft" src="signup.png" alt="Power Tools" style="width:49%">
    <img class="sRight" src="signup.png" alt="Power Tools" style="width:49%">
    
    
    <div class="signup">
    <form method="POST" action="registration_action.php">
        <label for="uId">UserID:</label>
        <input type="text" id="uId" name="uId" placeholder="User Identification"><br><br>

        <label for="pasW">Password:</label>
        <input type="password" id="pasW" name="pasW"><br><br>

        <label for="pasW2">Retype Password:</label>
        <input type="password" id="pasW2" name="pasW2" ><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="yourname@email.com" pattern= "[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}"><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="yourname"><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" pattern="\d\d" min="14" max="70"><br><br>
        <p>How will you travel?</p>
        <input type="checkbox" id="meth1" name="meth1" value="Walk">
        <label for="meth1">Carpool</label><br>
        
        <input type="checkbox" id="meth2" name="meth2" value="Drive">
        <label for="meth2">Drive</label><br><br>
        <p>What is your gender?</p>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label><br><br>

        <label>Your Experience </label>
        <select name="Role" id="Role">    
        <option value="Beginner">Beginner</option>
        <option value="Experienced">Experienced</option>
        <option value="Professional">Professional</option>
        <option value="Other">Other</option>
        </select><br><br>

        <input type="submit" value="Submit" onClick="passCheck()"><br>
    </form>
    </div>
</div>
<script>
    function passCheck() {
        var pass = document.getElementById("pasW").value;
        var passC = document.getElementById("pasW2").value;

        if(pass!=passC){
            alert("Passwords do not match")
        }
    }
</script>
    </body>
</html>

