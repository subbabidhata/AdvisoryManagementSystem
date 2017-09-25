
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
      color: blue;
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

  <?php require_once("config.php");

  require_once("headermenu.php");

  echo "
<body>

</body>
</html>";
  

  $allrecords = fetchAllUsersAdvisor();
  ?>
  <h3>List of all Advisors!</h3>
  
  <!-- Table goes in the document BODY -->
  <table class="table-style-three" width="1400px">
      <thead>
        <!-- display user details header  -->
        <th>User ID</th>
        <th>User Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>MemberSince</th>
        <th>Active</th>
        <th>Role</th>
        <th>Options</th>

      </thead>
      <tbody>
      <?php
      foreach($allrecords as $displayRecords) { ?>
      <tr>
        <td>/<a href="updateThisUser.php?UserID=<?php print $displayRecords['UserID']; ?>"><?php print $displayRecords['UserID']; ?></a></td>
        <td><?php print $displayRecords['UserName']; ?></td>
        <td><?php print $displayRecords['FirstName']; ?></td>
        <td><?php print $displayRecords['LastName']; ?></td>
        <td><?php print $displayRecords['Email']; ?></td>
        <td><?php print date("Y-m-d", $displayRecords['MemberSince']); ?></td>
        <td><?php print $displayRecords['Active']; ?></td>
        <td><?php print $displayRecords['role']; ?></td>
        <td><a href="updateThisUser.php?UserID=<?php print $displayRecords['UserID']; ?>"><?php print "Modify : ".$displayRecords['UserID']; ?></a><?php print " / "?><a href="deleteThisUser.php?UserID=<?php print $displayRecords['UserID']; ?>"><?php print "Delete : ".$displayRecords['UserID']; ?></a></td>
      </tr>
      <?php } ?>
      </tbody>
  </table>

</body>
</html>
