<?php

//Links for logged in user
if(isUserLoggedIn()) {

	if($loggedInUser->role == 1)
	{
		echo " <h3>Hello Admin</h3>
	    <ul>
	    <h1>Student</h1>
		<li><a href='createNewRecord_Student.php'>Create New User</a></li>
		<li><a href='displayAllRecords_Student.php'>Read all Students</a></li>
		<br><br>
		<h1>Advisor</h1>
		<li><a href='createNewRecord_Advisor.php'>Create New User</a></li>
		<li><a href='displayAllRecords_Advisor.php'>Read all Advisor</a></li>
		<br><br>
		<h1>Appointment</h1>
		<li><a href='createNewRecord_Appointment_Admin.php'>Create New Appointment</a></li>
		<li><a href='displayAllAppt_unconfirmed.php'>Pending Appointments</a></li>
		<li><a href='displayAllAppt_confirmed.php'>Confirmed Appointments</a></li>
		<li><a href='logout.php'>Logout</a></li>
	    </ul>";?>

<?php
	}
	else
	{
		if($loggedInUser->role == 2)
		{
			echo " <h3>Hello Student </h3>
	        <ul>
	        <li><a href='createNewRecord_Appointment_Student.php'>Create New Appointment</a></li>
			<li><a href='displayAllAppt_myunconfirmed.php'>Pending Confirmation</a></li>
			<li><a href='displayAllAppt_myconfirmed.php'>Confirmed Appointment</a></li>
			<li><a href='logout.php'>Logout</a></li>
		</ul>";
		}
		else{
			if($loggedInUser->role == 3)
			{
				echo " <h3>Hello Advisor</h3>
				<ul>
				<li><a href='createNewRecord_Appointment_Advisor.php'>Create New Appointment</a></li>
				<li><a href='displayAllAppt_myunconfirmed_advisor.php'>Pending Confirmation</a></li>
				<li><a href='displayAllAppt_myconfirmed_advisor.php'>Confirmed Appointment</a></li>
				<li><a href='logout.php'>Logout</a></li>
				</ul>";
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
