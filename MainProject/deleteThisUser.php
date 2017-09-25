<?php

require_once("config.php");
require_once ("headermenu.php");

$thisUserID = $_GET['UserID'];
echo $thisUserID;

$foundUser = fetchThisUser($thisUserID);

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

<form name="getUserDetails" method="post" action="deleteSelectedUser.php">
<table class="table-style-three" align="center">
  <?php foreach ($foundUser as $details) { ?>
  <tr><td>User Name :</td>      <td><input type="text" name="UserName" value="<?php print $details['UserName']; ?>"></td></tr>
  <tr><td>First Name:</td>       <td><input type="text" name="FirstName" value="<?php print $details['FirstName']; ?>"></td></tr>
  <tr><td>Last Name :</td>  <td><input type="text" name="LastName" value="<?php print $details['LastName']; ?>"></td></tr>
  <tr><td>Email:</td>          <td><input type="text" name="Email" value="<?php print $details['Email']; ?>"></td></tr>
  <tr><td>MemberSince:</td>           <td><input type="text" name="MemberSince" value="<?php print $details['MemberSince']; ?>"></td></tr>
  <tr><td>Active:</td>            <td><input type="text" name="Active" value="<?php print $details['Active']; ?>"></td></tr>
    <tr><td>RoleID:</td>            <td><input type="text" name="role" value="<?php print $details['role']; ?>"></td></tr>
    <tr><td>Userid : </td>      <td><input type="text" name="useriddisabled" value="<?php print $details['UserID'];?>" disabled></td></tr>
    <tr><td colspan="2" align="center"><input  type="submit" name="submit" value="Delete Me"></td></tr>
    <input type="hidden" name="UserID" value="<?php print $details['UserID'];?>" >
  <?php } ?>
</table>



</form>


</body>
</html>