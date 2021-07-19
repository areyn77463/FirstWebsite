<?php require 'header.php'; 
 $db = new SQLite3('project.db') or die($db);
if(session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if( isset($_SESSION['success'])) {
echo ($_SESSION['success']);
unset($_SESSION['success']);
}

/*if( isset($_SESSION['logMess'])) {
  echo ($_SESSION['logMess']);
  echo ($_SESSION['logged_in']); // debug output
  unset($_SESSION['logMess']);
  }*/
?>
<body>
    <div id="menu"> <?php require 'menu.php'; ?> </div>

    <div class="eHead">
    <img src="resources/images/const.png" alt="construction Banner" style="width:100%">
    <div class="event">Events Calendar</div>
    <div class="month">
   February<br><span style="font-size:18px">2021</span>
    </div>
</div>
<ul class="weekdays">
  <li>Monday</li>
  <li>Tuesday</li>
  <li>Wednesday</li>
  <li>Thursday</li>
  <li>Friday</li>
  <li>Saturday</li>
  <li>Sunday</li>
</ul>

<ul class="days">
  <li>1 Novice Meeting @4pm</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6 Breakfast for Builders @8am</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li>10 BlueTalk @7pm</li>
  <li>11</li>
  <li>12</li>
  <li>13 Breakfast for Builders @8am</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19 Tool Expo @6pm</li>
  <li>20 Breakfast for Builders @8am</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27 Breakfast for Builders @8am</li>
  <li>28</li>
</ul>
<h5>*All events above are held monthly in the Heart of Virginia location</h5>
<h5>The events below are added by members and are held on their respective dates and times</h5>

<?php
if($_SESSION['logged_in'])
  echo "<a href=\"new_event.php\"> Add Event</a><br>";
else{
  echo "<a href=\"login.php\"> Add Event</a><br>";
  $_SESSION['logMess'] = "Please log in to create an event!";
}
?>

<?php

$query = $db->query('SELECT * FROM events ORDER BY dateNTime ASC');

if ($query->numColumns() > 0) {
  while (($row = $query->fetchArray(SQLITE3_ASSOC))) {
    echo "Event: " . $row["eventName"]. " - Sponsor: " . $row["sponsor"]. " - Date: " . $row["dateNTime"]. " - Description: " . $row["descr"]. "<br>";
  }
} else
  echo "0 events";
?>
</body>
</html>