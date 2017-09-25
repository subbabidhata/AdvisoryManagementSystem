
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
<div id='left-nav'>";

  /*include("left-nav.php");*/


  echo "
</div>
</body>
</html>";
  

  $allrecords = fetchMyNotConfirmedAppAdvisor();
  ?>
  <h3>Hello Advisor!All Pending Appointment Confirmation List</h3>
  
  <!-- Table goes in the document BODY -->
  <table class="table-style-three" width="1390px">
      <thead>
        <!-- display user details header  -->
        <th>Appointment ID</th>
        <th>Student ID</th>
        <th>Advisor ID</th>
        <th>Time</th>
        <th>Date</th>
        <th>Active</th>
        <th>Options</th>

      </thead>
      <tbody>
      <?php
      foreach($allrecords as $displayRecords) { ?>
      <tr>
        <td><?php print $displayRecords['ano']; ?></td>
        <td><?php print $displayRecords['astudent']; ?></td>
        <td><?php print $displayRecords['aadvisor']; ?></td>
        <td><?php print $displayRecords['atime']; ?></td>
        <td><?php print $displayRecords['adate']; ?></td>
        <td><?php print $displayRecords['ashow']; ?></td>
        <td><a href="updateThisAppt.php?ano=<?php print $displayRecords['ano']; ?>"><?php print "Modify : ".$displayRecords['ano']; ?></a><?php print " / "?>
            <a href="updateThisAppt_Confirm.php?ano=<?php print $displayRecords['ano']; ?>"><?php print "Confirm : ".$displayRecords['ano']; ?></a><?php print " / "?>
            <a href="updateThisAppt_Delete.php?ano=<?php print $displayRecords['ano']; ?>"><?php print "Delete : ".$displayRecords['ano']; ?>
        </td>
      </tr>
      <?php } ?>
      </tbody>
  </table>

</body>
</html>
