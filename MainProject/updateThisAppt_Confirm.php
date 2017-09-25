<?php

require_once("config.php");
require_once("headermenu.php");
echo "
<body>
<div id='left-nav'>";

/*include("left-nav.php");*/

echo "
</div>
</body>
</html>";

$thisUserID = $_GET['ano'];
echo $thisUserID;

$foundUser = fetchThisApp($thisUserID);
echo "<pre>";
  /*print_r($foundUser);*/
echo "</pre>";
?>

<html>
<head>
  <!-- Style -- Can also be included as a file usually style.css -->
  <style type="text/css">
  table.table-style-three {
    font-family: verdana, arial, sans-serif;
    font-size: 11px;
    color: #333333;
    border-width: 1px;
    border-color: #3A3A3A;
    border-collapse: collapse;
  }
  table.table-style-three th {
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #FFA6A6;
    background-color: #D56A6A;
    color: #ffffff;
  }
  table.table-style-three a {
    color: #ffffff;
    text-decoration: none;
  }

  table.table-style-three tr:hover td {
    cursor: pointer;
  }
  table.table-style-three tr:nth-child(even) td{
    background-color: #F7CFCF;
  }
  table.table-style-three td {
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #FFA6A6;
    background-color: #ffffff;
  }
</style>

</head>
<body>

<form name="getUserDetails" method="post" action="processUpdateApp_Confirm.php">
<table class="table-style-three">
  <?php foreach ($foundUser as $details) { ?>
  <tr><td>Student ID:</td>      <td><input type="text" name="astudent" value="<?php print $details['astudent']; ?>"></td></tr>
  <tr><td>Advisor ID:</td>       <td><input type="text" name="aadvisor" value="<?php print $details['aadvisor']; ?>"></td></tr>
  <tr><td>Time:</td>  <td><input type="text" name="atime" value="<?php print $details['atime']; ?>"></td></tr>
  <tr><td>Date:</td>          <td><input type="text" name="adate" value="<?php print $details['adate']; ?>"></td></tr>
    <tr><td>Appointment ID : </td>      <td><input type="text" name="useriddisabled" value="<?php print $details['ano'];?>" disabled></td></tr>
    <input type="hidden" name="ano" value="<?php print $details['ano'];?>" >
  <?php } ?>
</table>

  <input type="submit" name="submit" value="Confirm Appointment">

</form>


</body>
</html>