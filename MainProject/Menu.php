<?php
require_once("config.php");


error_reporting(1);
?>
<html>
<head>
    <title> ADVISOR MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
</head>

<body>



<table class="table table-bordered">

    <tr>
        <td align=left>


            <?php

            //Links for logged in user
            if(isUserLoggedIn()) {

                if($loggedInUser->role == 1)
                {
                    echo "<body>
<table class=\"table table-bordered\">

<tr bgcolor=\"#faebd7\"><td align=center><font size=4 color=red>
                STUDENT</font></td></tr>
		<tr><td><a href='createNewRecord_Student.php'>Create New User</a></td></tr>
		<tr><td><a href='displayAllRecords_Student.php'>Read all Students</a></td></tr>
		<tr bgcolor=\"#faebd7\"><td align=center><font size=4 color=red>
                ADVISOR</font></td></tr>
		
		<tr><td><a href='createNewRecord_Advisor.php'>Create New Advisor</a></td></tr>
		<tr><td><a href='displayAllRecords_Advisor.php'>Read all Advisor</a></td></tr>
		<tr bgcolor=\"#faebd7\"><td align=center><font size=4 color=red>
                APPOINTMENT</font></td></tr>
		<tr><td><a href='createNewRecord_Appointment_Admin.php'>Create New Appointment</a></td></tr>
		<tr><td><a href='displayAllAppt_unconfirmed.php'>Pending Appointments</a></td></tr>
		<tr><td><a href='displayAllAppt_confirmed.php'>Confirmed Appointments</a></td></tr>
		
	    </ul></table></body>";?>

                    <?php
                }
                else
                {
                    if($loggedInUser->role == 2)
                    {
                        echo " <body>
<table class=\"table table-bordered\">

<tr bgcolor=\"#faebd7\"><td align=center><font size=4 color=red>
                Hello Student</font></td></tr>
	      <tr><td><a href='createNewRecord_Appointment_Student.php'>Create New Appointment</a></td></tr>
			<tr><td><a href='displayAllAppt_myunconfirmed.php'>Pending Confirmation</a></td></tr>
			<tr><td><a href='displayAllAppt_myconfirmed.php'>Confirmed Appointment</a></td></tr>
			
		</td></tr></table></body>
		";
                    }
                    else{
                        if($loggedInUser->role == 3)
                        {
                            echo " <body>
<table class=\"table table-bordered\">

<tr bgcolor=\"#faebd7\"><td align=center><font size=4 color=red>
                Hello Advisor</font></td></tr>
				 <tr><td><a href='createNewRecord_Appointment_Advisor.php'>Create New Appointment</a></td></tr>
				 <tr><td><a href='displayAllAppt_myunconfirmed_advisor.php'>Pending Confirmation</a></td></tr>
				 <tr><td><a href='displayAllAppt_myconfirmed_advisor.php'>Confirmed Appointment</a></td></tr>
				 
				</td></tr></table></body>";
                        }

                    }
                }
            }
//Links for users not logged in
            else {
                echo "
	<ul>
		<li><a href='index.php'>Home</a></li>
		<li><a href='login.php'>Login</a></li>
		<li><a href='register.php'>Register</a></li>
	</ul>";
            }

            ?>



        </td>
        </tr>
        </table>
</table>

</body>
</html>